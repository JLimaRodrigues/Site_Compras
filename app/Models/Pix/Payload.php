<?php 

namespace App\Pix;

class Payload {

    /**
     * IDs do Payload do Pix
     * @var string
    */
    const ID_PAYLOAD_FORMAT_INDICATOR = '00';
    const ID_MERCHANT_ACCOUNT_INFORMATION = '26';
    const ID_MERCHANT_ACCOUNT_INFORMATION_GUI = '00';
    const ID_MERCHANT_ACCOUNT_INFORMATION_KEY = '01';
    const ID_MERCHANT_ACCOUNT_INFORMATION_DESCRIPTION = '02';
    const ID_MERCHANT_CATEGORY_CODE = '52';
    const ID_TRANSACTION_CURRENCY = '53';
    const ID_TRANSACTION_AMOUNT = '54';
    const ID_COUNTRY_CODE = '58';
    const ID_MERCHANT_NAME = '59';
    const ID_MERCHANT_CITY = '60';
    const ID_ADDITIONAL_DATA_FIELD_TEMPLATE = '62';
    const ID_ADDITIONAL_DATA_FIELD_TEMPLATE_TXID = '05';
    const ID_CRC16 = '63';

    /**
     *  Chave do PIX
     *  @var String
    */
    private $chavePix;

    /**
     *  Descrição do Pagamento
     *  @var String
    */
    private $descricao;

    /**
     *  Nome do Titular da Conta
     *  @var String
    */
    private $nomeTitular;

    /**
     *  Cidade do Titular da Conta
     *  @var String
    */
    private $cidadeTitular;

    /**
     *  ID da Transação
     *  @var String
    */
    private $idTransacao;

    /**
     *  Valor da Transação
     *  @var String
    */
    private $valor;

    /**
     * Método responsável por Atribuir o valor de $chavePix
     * @param string $chavePix
    */
    public function setChavePix($chavePix){
        $this->chavePix = $chavePix;
        return $this;
    }

    /**
     * Método responsável por Atribuir a $descrição
     * @param string $descricao
    */
    public function setDescricao($descricao){
        $this->descricao = $descricao;
        return $this;
    }

    /**
     * Método responsável por Atribuir o valor de $nomeTitular
     * @param string $nomeTitular
    */
    public function setNomeTitular($nomeTitular){
        $this->nomeTitular = $nomeTitular;
        return $this;
    }

    /**
     * Método responsável por Atribuir o valor de $cidadeTitular
     * @param string $cidadeTitular
    */
    public function setCidadeTitular($cidadeTitular){
        $this->cidadeTitular = $cidadeTitular;
        return $this;
    }

    /**
     * Método responsável por Atribuir o valor de $idTransacao
     * @param string $idTransacao
    */
    public function setIdTransacao($idTransacao){
        $this->idTransacao = $idTransacao;
        return $this;
    }

    /**
     * Método responsável por Atribuir o valor de $valor
     * @param float $valor
    */
    public function setValor($valor){
        $this->valor = (string)number_format($valor,2,'.','');
        return $this;
    }

    /**
     * Método responsável por retornar um valor completo de um objeto do payload
     * @param string $id
     * @param string $valor
     * @return string $id.$tamanho.$valor
    */
    public function getValorPayload($id, $valor){
        $tamanho = str_pad(strlen($valor),2,'0',STR_PAD_LEFT);

        return $id.$tamanho.$valor;
    }

    /**
     * Método responsável por retornar os valores completos da informação da conta
     * @return string
    */
    private function getInformacoesConta(){

        //DOMINIO DO BANCO
        $dominio = $this->getValorPayload(self::ID_MERCHANT_ACCOUNT_INFORMATION_GUI, 'br.gov.bcb.pix');

        //CHAVE PIX
        $chave = $this->getValorPayload(self::ID_MERCHANT_ACCOUNT_INFORMATION_KEY, $this->chavePix);

        //DESCRIÇÃO DO PAGAMENTO
        $descricao = strlen($this->descricao) ? $this->getValorPayload(self::ID_MERCHANT_ACCOUNT_INFORMATION_DESCRIPTION, $this->descricao) : '';
    
        //VALOR COMPLETO DA CONTA
        return $this->getValorPayload(self::ID_MERCHANT_ACCOUNT_INFORMATION, $dominio.$chave.$descricao);
    }

    /**
     * Método responsável por retornar os valores completos do campo adicional do PIX (ID TRANSACAO)
     * @return string
    */
    private function getCampoAdicional(){
        //ID TRANSACAO
        $idTransacao = $this->getValorPayload(self::ID_ADDITIONAL_DATA_FIELD_TEMPLATE_TXID, $this->idTransacao);

        //RETORNA O VALOR COMPLETO
        return $this->getValorPayload(self::ID_ADDITIONAL_DATA_FIELD_TEMPLATE, $idTransacao);
    }

    /**
     * Método responsável por gerar o código completo do payload do PIX
     * @return string
    */
    public function getPayload(){

        //CRIA O PAYLOAD
        $payload = $this->getValorPayload(self::ID_PAYLOAD_FORMAT_INDICATOR, '01').
                   $this->getInformacoesConta().
                   $this->getValorPayload(self::ID_MERCHANT_CATEGORY_CODE, '0000').
                   $this->getValorPayload(self::ID_TRANSACTION_CURRENCY, '986').
                   $this->getValorPayload(self::ID_TRANSACTION_AMOUNT, $this->valor).
                   $this->getValorPayload(self::ID_COUNTRY_CODE, 'BR').
                   $this->getValorPayload(self::ID_MERCHANT_NAME, $this->nomeTitular).
                   $this->getValorPayload(self::ID_MERCHANT_CITY, $this->cidadeTitular).
                   $this->getCampoAdicional();

        //RETORNA O PAYLOAD + CRC16
        return $payload.$this->getCRC16($payload);
    }

    /**
     * Método responsável por calcular o valor da hash de validação do código pix
     * @return string
    */
    private function getCRC16($payload) {
        //ADICIONA DADOS GERAIS NO PAYLOAD
        $payload .= self::ID_CRC16.'04';

        //DADOS DEFINIDOS PELO BACEN
        $polinomio = 0x1021;
        $resultado = 0xFFFF;

        //CHECKSUM
        if (($length = strlen($payload)) > 0) {
            for ($offset = 0; $offset < $length; $offset++) {
                $resultado ^= (ord($payload[$offset]) << 8);
                for ($bitwise = 0; $bitwise < 8; $bitwise++) {
                    if (($resultado <<= 1) & 0x10000) $resultado ^= $polinomio;
                    $resultado &= 0xFFFF;
                }
            }
        }

        //RETORNA CÓDIGO CRC16 DE 4 CARACTERES
        return self::ID_CRC16.'04'.strtoupper(dechex($resultado));
    }
}

?>
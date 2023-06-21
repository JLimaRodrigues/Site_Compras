<?php 

require __DIR__.'/vendor/autoload.php';

use \App\Pix\Payload;
use Mpdf\Qrcode\Qrcode;
use Mpdf\Qrcode\Output;

//INSTANCIA PRINCIPAL DO PAYLOAD PIX
$objPayload = (new Payload)->setChavePix('12345678900')
                           ->setDescricao('Pagamento do pedido 1234512345')
                           ->setNomeTitular('João Gomes')
                           ->setCidadeTitular('SAO PAULO')
                           ->setIdTransacao('LR1223')
                           ->setValor(344.45);

//CÓDIGO DE PAGAMENTO PIX
$payloadQrCode = $objPayload->getPayload();

//QR CODE
$objQrcode = new Qrcode($payloadQrCode);

//IMAGEM DO QRCODE
$imagem = (new Output\Png)->output($objQrcode, 400);

//echo '<pre>';print_r($payloadQrCode);echo'</pre>';exit;
header('content-type: image/png');
echo $imagem;
?>
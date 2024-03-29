<?php 

namespace App\Http\Controllers;

use App\Models\Pix\Payload;
use Mpdf\QrCode\QrCode;
use Mpdf\QrCode\Output;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * classe SiteController
 * @author Jefferson Lima Rodrigues
*/
class SiteController {

    public function index(Request $request)
    {

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
        $imagem =  (new Output\Svg)->output($objQrcode, 400, 'white', 'black');
        return view('site.index', [
            'imagem' => $imagem,
            'hash' => $payloadQrCode
        ]);
    }
}

?>
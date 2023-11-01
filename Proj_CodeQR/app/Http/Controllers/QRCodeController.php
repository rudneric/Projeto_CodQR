<?php

namespace App\Http\Controllers;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRCodeController extends Controller
{
    public function gerarQRCode($id)
{
    $url = '/ver/publicacao/' . $id ;
    $svg = QrCode::size(200)->generate($url);
    
    return view('qrcode', ['svg' => $svg]);
}

    public function redirecionar()
    {
        return redirect('/outra-rota');
    }
}
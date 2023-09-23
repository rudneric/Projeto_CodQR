<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRCodeController extends Controller
{
    public function gerarQRCode()
{
    $url = 'https://www.youtube.com/watch?v=WorXRPZqjeI&t=63s';
    $svg = QrCode::size(200)->generate($url);
    
    return view('qrcode', ['svg' => $svg]);
}

    public function redirecionar()
    {
        return redirect('/outra-rota');
    }
}
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdmController;
use App\Http\Controllers\UtensilioController;
use App\Http\Controllers\QRCodeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/qrcode', function(){
    return view('qrcode');
});

Route::get('/gerar-qrcode', [QRCodeController::class, 'gerarQRCode']);
Route::get('/redirecionar', [QRCodeController::class, 'redirecionar']);

    //Rota do Administrador
// Route::get('/adm/login', [AdmController::class, 'index']);

Route::get('/adm/cadastros', [AdmController::class, 'show']);

Route::get('/cadastro/utensilio', [UtensilioController::class, 'create']);
Route::post('/adm/cadastros', [UtensilioController::class, 'store']);

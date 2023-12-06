<?php

use App\Http\Controllers\ExibirDadosController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicacaoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\UtensilioController;
use App\Http\Controllers\VideoController;


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
    return redirect('login');
});

Route::get('/dashboard', [PublicacaoController::class, 'show'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/qrcode', function(){
    return view('qrcode');
});

// ROTA DO QRCODE
Route::get('/gerar-qrcode/{id}', [QRCodeController::class, 'gerarQRCode']);
Route::get('/redirecionar', [QRCodeController::class, 'redirecionar']);

// ROTAS DOS UTENSILIOS 
Route::get('/cadastro/utensilio', [UtensilioController::class, 'create'])->middleware('auth');
Route::post('/utensilio/store', [UtensilioController::class, 'store']);
Route::delete('/utensilio/delete/{id}', [UtensilioController::class, 'destroy'])->middleware('auth');
Route::put('/utensilio/update/{utensilio}', [UtensilioController::class, 'update'])->middleware('auth');

// ROTAS DOS VIDEOS
Route::get('/cadastro/video', [VideoController::class, 'create'])->middleware('auth');
Route::post('/video/store', [VideoController::class, 'store'])->name('video.store');
Route::delete('/video/delete/{id}', [VideoController::class, 'destroy'])->middleware('auth');
Route::put('/video/update/{video}', [VideoController::class, 'update'])->middleware('auth');

// ROTAS DAS PUBLICACOES
Route::get('/cadastro/publicacao', [PublicacaoController::class, 'create'])->middleware('auth');
Route::post('/publicacao/store', [PublicacaoController::class, 'store'])->middleware('auth');
Route::delete('/publicacao/delete/{id}', [PublicacaoController::class, 'destroy'])->middleware('auth');
Route::put('/publicacao/update/{publicacao}', [PublicacaoController::class, 'update'])->middleware('auth');

// Rota para coletar e exibir os itens do banco de dados
Route::get('/exibe/itens/banco', [ExibirDadosController::class, 'show'])->middleware('auth');
Route::get('/ver/publicacao/{id}', [ExibirDadosController::class, 'verPub']);
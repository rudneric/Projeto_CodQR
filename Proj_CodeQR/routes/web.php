<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdmController;
use App\Http\Controllers\PublicacaoController;
use App\Http\Controllers\UtensilioController;
use App\Http\Controllers\VideoController;
use App\Models\Publicacao;
use App\Models\Video;

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
    //Rota para a página de login de ADM
Route::get('/adm/login', [AdmController::class, 'index']);

    //Rota simples para a tela onde o ADM pode fazer os cadastros
Route::post('/cadastros',function(){
    return view('adm.options');
});

    //Rotas para os Utensilios
Route::get('/cadastro/utensilios', [UtensilioController::class, 'create']);
Route::post('/cadastros', [UtensilioController::class, 'show']);

    //Rotas para as Publicações
Route::get('/cadastro/publicacao', [PublicacaoController::class, 'create']);  
Route::post('/cadastros', [PublicacaoController::class, 'show']); 

   //Rotas para os videos
Route::get('/cadastro/Video', [VideoController::class, 'create']);  
Route::post('/cadastros', [VideoController::class, 'show']);

    

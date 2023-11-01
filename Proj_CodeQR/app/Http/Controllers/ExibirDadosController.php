<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Utensilio;
use App\Models\Publicacao;


class ExibirDadosController extends Controller
{
    public function show(Request $request)
    {
        $utensilio = Utensilio::all();

        $video = Video::all();

        $publicacao = Publicacao::all();

        return view('cadastros.exibeDados', ['publicacao' => $publicacao, 'utensilio' => $utensilio, 'video' => $video]);
    }

    public function verPub($id)
    {
        $publicacao = Publicacao::findOrFail($id);

        return view('publicacao', ['publicacao' => $publicacao]);
    }
    
}

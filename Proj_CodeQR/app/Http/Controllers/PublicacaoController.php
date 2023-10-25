<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publicacao;
use App\Models\Video;
use App\Models\Utensilio;
use App\Http\Requests\UpdatePublicacaoRequest;
use Illuminate\Support\Facades\Storage;

class PublicacaoController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        $video = Video::all();
        $utensilio = Utensilio::all();

        return view('cadastros.cadPublicacoes', ['video' => $video, 'utensilio' => $utensilio]);
    }

    public function store(Request $request)
    {
        $publicacao = new Publicacao();

        $publicacao->titulo = $request->titulo;
        $publicacao->descricao = $request->descricao;
        $publicacao->video = $request->video;
        $publicacao->pubUserCodigo = $request->pubUserCodigo;

        if ($request->hasFile('imagem') && $request->imagem->isValid()) {
            $imagePath = $request->imagem->store('publicacoes');

            $publicacao['imagem'] = $imagePath;
        }
        $publicacao->save();

        return redirect('dashboard');
    }

    public function show(Request $request, $id)
    {
        $publicacao = Publicacao::all();

        return view('dashoard', ['publicacao' => $publicacao]);
    }

    public function edit(Publicacao $publicacao)
    {
        //
    }

    public function update(Request $request, Publicacao $publicacao)
    {
        $publicacao->update([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
        ]);

        if ($request->hasFile('imagem') && $request->imagem->isValid()) {
            if ($publicacao->imagem && Storage::fileExists($publicacao->imagem)) {
                Storage::delete($publicacao->imagem);
            }
            $imagePath = $request->imagem->store('publicacoes');

            $publicacao['imagem'] = $imagePath;
        }

        return redirect('/exibe/itens/banco');
    }

    public function destroy(Request $request)
    {
        Publicacao::destroy($request->id);

        $request->session();

        return redirect('/exibe/itens/banco');
    }
}

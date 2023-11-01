<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publicacao;
use App\Models\Video;
use App\Models\Utensilio;
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

        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $requestImage = $request->file('imagem'); // Corrigir chamada de método
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now"))  . "." . $extension;
            $requestImage->move(public_path('img/publicacoes'), $imageName);
            $publicacao['imagem'] = $imageName; // Corrigir atribuição do nome do arquivo
        }
        
        $publicacao->save();

        return redirect('dashboard');
    }

    public function show(Request $request)
    {
        $publicacao = Publicacao::all();

        return view('dashboard', ['publicacao' => $publicacao]);
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

        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            if ($publicacao->imagem && Storage::fileExists($publicacao->imagem)) {
                Storage::delete($publicacao->imagem);
            }
            $requestImage = $request->file('imagem'); 
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now"))  . "." . $extension;
            $requestImage->move(public_path('img/publicacoes'), $imageName);
            $publicacao['imagem'] = $imageName; // Corrigir atribuição do nome do arquivo
        }

        return redirect('dashboard');
    }

    public function destroy(Request $request)
    {
        Publicacao::destroy($request->id);

        $request->session();

        return redirect('dashboard');
    }
}

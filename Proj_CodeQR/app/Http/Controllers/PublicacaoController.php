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

    public function store(Request $request, Publicacao $publicacao)
    {
        // $publicacao = $request->validate([
        //     'imagem' => 'required|mimes:png,jpg,jpeg',
        //     'gif' => 'required|mimes:gif',
        // ]);
        // $publicacao = new Publicacao();

        // $publicacao->titulo = $request->titulo;
        // $publicacao->descricao = $request->descricao;
        // $publicacao->video = $request->video;
        // $publicacao->pubUserCodigo = $request->pubUserCodigo;

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

        // Supondo que você está recebendo um array de imagens de algum lugar, como um formulário
        // $arrayDeImagens = $request->file('gifs[]');


        // if (!empty($arrayDeImagens)) {
        //     // Se $publicacao->gif for nulo, inicialize com uma string vazia
        //     $publicacao->gif = $publicacao->gif ?? '';

        //     foreach ($arrayDeImagens as $imagem) {
        //         $extension = $imagem->extension();
        //         $imageName = md5($imagem->getClientOriginalName() . strtotime("now")) . "." . $extension;
        //         $imagem->move(public_path('gifs[]'), $imageName);

        //         // Adicione a nova imagem à string separada por vírgula
        //         $publicacao->gif .= ($publicacao->gif ? ',' : '') . $imageName;
        //     }
        // }
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

        return redirect('dashboard');
    }

    public function destroy(Request $request, Publicacao $publicacao)
    {
        Publicacao::destroy($request->id);

        $request->session();

        return redirect('dashboard');
    }
}

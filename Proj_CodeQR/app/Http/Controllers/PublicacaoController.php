<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publicacao;
use App\Http\Requests\StorePublicacaoRequest;
use App\Http\Requests\UpdatePublicacaoRequest;

class PublicacaoController extends Controller
{

    public function index()
    {
        //return view('adm.options');
    }

    public function create()
    {
        return view ('cadastros.cadPublicacoes');
    }

    public function store(StorePublicacaoRequest $request)
    {
        //
    }

    public function show(Request $request)
    {
        // $request->validate([
        //     'nome' => 'required|',
        //     'idade' => 'required|numeric',
        //     'cpf' => 'required|numeric',
        // ]);

        // $nome = $request->post('nome');
        // $idade = $request->post('idade');
        // $cpf = $request->post('cpf');

        // return view ('idosos.exibirCadastro', [
        //     'nome' => $nome,
        //     'idade' => $idade,
        //     'cpf' => $cpf,
        // ]);
    }

    public function edit(Publicacao $idoso)
    {
        //
    }

    public function update(UpdatePublicacaoRequest $request, Publicacao $idoso)
    {
        //
    }

    public function destroy(Publicacao $idoso)
    {
        //
    }
}

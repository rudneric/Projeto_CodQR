<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;

class VideoController extends Controller
{
    public function index()
    {
        //return view('welcome');
    }

    public function create()
    {
        //return view('idosos.cadastrarIdosos');
    }

    public function store(StoreVideoRequest $request)
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

    public function edit(Video $idoso)
    {
        //
    }

    public function update(UpdateVideoRequest $request, Video $idoso)
    {
        //
    }

    public function destroy(Video $idoso)
    {
        //
    }
}

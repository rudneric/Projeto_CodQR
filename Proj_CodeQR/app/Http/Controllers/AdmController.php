<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adm;
use App\Http\Requests\StoreAdmRequest;
use App\Http\Requests\UpdateAdmRequest;

class AdmController extends Controller
{

    public function index()
    {
      
        return view('adm.index');
    }

    public function create()
    {
        
    }

    public function store(StoreAdmRequest $request)
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

    public function edit(Adm $idoso)
    {
        //
    }

    public function update(UpdateAdmRequest $request, Adm $idoso)
    {
        //
    }

    public function destroy(Adm $idoso)
    {
        //
    }
}

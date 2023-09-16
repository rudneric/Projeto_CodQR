<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utensilio;
use App\Http\Requests\StoreUtensilioRequest;
use App\Http\Requests\UpdateUtensilioRequest;

class UtensilioController extends Controller
{
    public function index()
    {
        //return view('welcome');
    }

    public function create()
    {
        return view('cadastros.cadUtensilios');
    }

    public function store(StoreUtensilioRequest $request)
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

    public function edit(Utensilio $idoso)
    {
        //
    }

    public function update(UpdateUtensilioRequest $request, Utensilio $idoso)
    {
        //
    }

    public function destroy(Utensilio $idoso)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utensilio;
//use App\Http\Requests\StoreUtensilioRequest;
//use App\Http\Requests\UpdateUtensilioRequest;

class UtensilioController extends Controller
{
    public function index()
    {
        
    }

    public function create()
    {
        return view('cadastros.cadUtensilio');
    }

    public function store(Request $request)
    {
        $utensilio = new Utensilio;
        $request->validate([
            'uteNome' => 'required',
            'quantidade' => 'required',
            'resistencia' => 'required',
         ], 
        [
            'uteNome.required' => 'Campo Nome é obrigatório!',
            'quantidade.required' => 'Campo Quantidade é obrigatório!',
            'resistencia.required' => 'Campo Resistencia é obrigatório!',
        ]);

        $utensilio->uteNome = $request->uteNome;
        $utensilio->quantidade = $request->quantidade;
        $utensilio->resistencia = $request->resistencia;

        $utensilio->save();

        return view('cadastros.cadUtensilio');
    }

    public function show()
    {
       //
    }

    public function edit(Utensilio $utensilio)
    {
        //
    }

    public function update(Request $request, Utensilio $utensilio)
    {
        $utensilio->update([
            'uteNome'=>$request->uteNome,
            'quantidade'=>$request->quantidade,
            'resistencia'=>$request->resistencia,
        ]);

        return redirect('/exibe/itens/banco');
    }

    public function destroy(Request $request)
    {
        Utensilio::destroy($request->id);

        $request->session();
        
        return redirect('/exibe/itens/banco');
    }
}

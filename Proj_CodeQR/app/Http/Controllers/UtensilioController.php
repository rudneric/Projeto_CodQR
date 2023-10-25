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
        return view('cadastros.cadUtensilios');
    }

    public function store(Request $request)
    {
        $utensilio = new Utensilio;

        $utensilio->uteNome = $request->uteNome;
        $utensilio->quantidade = $request->quantidade;
        $utensilio->resistencia = $request->resistencia;

        $utensilio->save();

        return view('dashboard');
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utensilio;
//use App\Http\Requests\StoreUtensilioRequest;
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

    public function store(Request $request)
    {
        $utensilio = new Utensilio();

        $utensilio->uteNome = $request->uteNome;
        $utensilio->quantidade = $request->quantidade;
        $utensilio->resistencia = $request->resistencia;

        $utensilio->save();

        return view('adm.dashboard');
    }

    public function show(Request $request)
    {
        //
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

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
      
    }

    public function store(StorePublicacaoRequest $request)
    {
        //
    }

    public function show(Request $request)
    {
        // 
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

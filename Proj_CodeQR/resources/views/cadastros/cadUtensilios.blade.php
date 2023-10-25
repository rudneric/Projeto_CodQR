@extends('layouts.master')

@section('head')
@endsection

@section('navbar')
@endsection

@section('content')
    <div id="utensilio-create-container" class="col-md-6 offset-md-3">
        <h1>Cadastre seu Utensilio</h1>
        <form action="{{ '/utensilio/store' }}" method="POST">
            @csrf
            <div class="form-goup">
                <label for="uteNome">Nome:</label>
                <input type="text" class="form-control" id="uteNome" name="uteNome" placeholder="Nome">
            </div>
            @csrf
            <div class="form-goup">
                <label for="quantidade">Quantidade:</label>
                <input type="text" class="form-control" id="quantidade" name="quantidade" placeholder="Quantidade">
            </div>
            @csrf
            <div class="form-goup">
                <label for="resistencia">Resistencia:</label>
                <input type="text" class="form-control" id="resistencia" name="resistencia" placeholder="Resistencia">
            </div>
            <input type="submit" class="btn btm-primary" value="Criar Utensilio">
        </form>
    </div>
@endsection

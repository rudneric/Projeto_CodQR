@extends('layouts.master')

@section('head')
@endsection

@section('navbar')
@endsection

@section('content')
    <div id="utensilio-create-container" class="col-md-6 offset-md-3">
        <h1 class="text-center">Cadastre de Utensilio</h1>
        <form action="{{ '/utensilio/store' }}" method="POST">
            @csrf
            <div class="form-goup mt-2">
                <label for="uteNome">Nome:</label>
                <input type="text" class="form-control" id="uteNome" name="uteNome" placeholder="Nome">
                @error('uteNome')
                    {{ $message }}
                @enderror
            </div>

            <div class="form-goup mt-2">
                <label for="quantidade">Quantidade:</label>
                <input type="text" class="form-control" id="quantidade" name="quantidade" placeholder="Quantidade">
                @error('quantidade')
                    {{ $message }}
                @enderror
            </div>

            <div class="form-goup mt-2">
                <label for="resistencia">Resistencia:</label>
                <select type="text" class="form-control" id="resistencia" name="resistencia">
                    <option value="">Selecione</option>
                    <option value="Frágil">Frágil</option>
                    <option value="Médio">Médio</option>
                    <option value="Forte">Forte</option>
                </select>
                @error('resistencia')
                    {{ $message }}
                @enderror
            </div>
            <input type="submit" class="form-control btn btn-outline-warning rounded-pill shadow-sm mt-3 rounded"
                value="Enviar">
        </form>

    </div>
@endsection

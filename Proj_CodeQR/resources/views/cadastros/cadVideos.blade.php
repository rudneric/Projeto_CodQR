@extends('layouts.master')

@section('head')
@endsection

@section('navbar')
@endsection

@section('content')
    <div id="video-create-container" class="col-md-6 offset-md-3">
        <h1 class="text-center">Cadastro de Video</h1>
        <form action="{{ '/video/store' }}" method="POST">
            @csrf
            <div class="form-goup mt-3">
                <label for="vidTitulo">Titulo</label>
                <input type="text" class="form-control" id="vidTitulo" name="vidTitulo" placeholder="Titulo">
            </div>
            @csrf
            <div class="form-goup mt-3">
                <label for="vidVideo">Link do Video</label>
                <input type="text" class="form-control" id="vidVideo" name="vidVideo" placeholder="Link">
            </div>
            <input type="submit" class="form-control btn mt-3 btn btn-outline-warning rounded-pill rounded-pill shadow-sm mt-3 rounded" value="Cadastrar" >
        </form>
    </div>
@endsection


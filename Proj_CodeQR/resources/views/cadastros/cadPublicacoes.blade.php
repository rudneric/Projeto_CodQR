@extends('layouts.master')

@section('head')
@endsection

@section('navbar')
@endsection

@section('content')
    <div id="utensilio-create-container" class="col-md-6 offset-md-3">
        <h1 class="text-center">Cadastre sua Publicação</h1>
        <form enctype="multipart/form-data" control action="{{ '/publicacao/store' }}" method="POST">
            @csrf
            <div class="form-goup mt-2">
                <label for="titulo">Titulo:</label>
                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Nome">
            </div>

            <div class="form-goup mt-2">
                <label for="video">Video:</label>
                <select type="text" class="form-control" id="video" name="video">
                    <option value="">Selecione</option>
                    @foreach ($video as $item)
                        <option value="{{ $item->vidVideo }}">{{ $item->vidTitulo }}</option>
                    @endforeach
                </select>
            </div>

             <div class="form-goup mt-2">
                <label for="imagem">Imagem da Capa</label>
               <input type="file" class="form-control" id="imagem" name="imagem">
            </div>

            <div class="form-goup mt-2">
                <input type="hidden" class="form-control" id="pubUserCodigo" name="pubUserCodigo"
                    value="{{ Auth::user()->id }}">
            </div>

            <div class="form-goup mt-2">
                <label for="descricao">Descrição:</label>
                <textarea class="form-control" id="descricao" name="descricao" rows="5" placeholder="Descrição"></textarea>
            </div>

            <div class="form-group mt-2">
                <input type="submit" class=" form-control mt-2 btn btn-outline-warning rounded-pill rounded-pill shadow-sm rounded" value="Publicar" >
            </div>
        </form>
    </div>
@endsection

@extends('layouts.master')

@section('title', $publicacao->title)
@endsection

@section('content')
<div class=" container-fluid col-md-6 offset-md-1">
<div class="row">
    <div id="vid-container">

        @php
            $nada = $publicacao->video
        @endphp
        <iframe class="mt-4" width="560" height="315" src="{{$nada}}"
            title="youtube video" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            allowfullscreen></iframe>
        <h3>{{$publicacao->titulo}}</h3>

        <div id="descricao-container" class="col-md-11 justify-end">
            <h6>Publicado em: {{$publicacao->created_at}}</h6>
            <p>{{$publicacao->descricao}}</p>
        </div>

    </div>
    @if ($publicacao->gif)
    <ul>
        @php
            $nomesDeImagens = explode(',', $publicacao->gif);
        @endphp

        @foreach ($nomesDeImagens as $imagem)
            <li>
                <img src="{{ asset('img/gifs' . $imagem) }}" alt="Imagem">
            </li>
        @endforeach
    </ul>
@endif


        
                {{-- <img src="{{ asset('img/gifs' . $publicacao->gif) }}" alt="Imagem"> --}}
         

    {{-- <img src="{{ asset('img/gifs/' . $publicacao->gif) }}" alt=""> --}}
    
</div>
</div>
@endsection

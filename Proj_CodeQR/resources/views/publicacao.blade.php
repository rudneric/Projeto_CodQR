@extends('layouts.master')

@section('title', $publicacao->title)
@endsection

@section('content')
<div class="col-md-6 offset-md-1">
<div class="row">
    <div id="vid-container" class="col-md-6">
        <iframe width="560" height="315" src="{{$publicacao->video}}"
            title="youtube video" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            allowfullscreen></iframe>
        <h3>{{$publicacao->titulo}}</h3>

        <h5>{{$publicacao->pubUserCodigo}}</h5>

        <div id="descricao-container" class="col-md-6">
            <h6>{{$publicacao->created_at}}</h6>
            <h6>{{$publicacao->descricao}}</h6>
        </div>
    </div>
    
</div>
</div>
@endsection

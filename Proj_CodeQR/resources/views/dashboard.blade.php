@extends('layouts.master')

@section('head')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @forelse ($publicacao as $item)
                <div class="col-sm-3">
                    <div class="card " id="{{ $item->id }}">
                        <img src="{{ asset('img/publicacoes/' . $item->imagem) }}"
                            style="max-width:250px; max-height:170px; width: auto; height: auto;" alt="">
                        <div class="card-body ">
                            <h5 class="card-title">{{ $item->titulo }}</h5>
                            <p class="card-text text-truncate">{{ $item->descricao }}</p>
                            @auth
                                <form class="d-inline-flex" action=" {{ url('/publicacao/delete', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"> <i class="bi bi-trash3"></i> </button>
                                </form>
                                <a class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#editPublicacaoModal_{{ $item->id }}"><i
                                        class="bi bi-pencil-square"></i></a>
                                <a href="/gerar-qrcode/{{ $item->id }}" class="btn btn-success"><i
                                        class="bi bi-qr-code"></i></a>
                            @endauth
                            <a href="/ver/publicacao/{{ $item->id }}" class="btn btn-primary ">Mais</a>

                            <!-- OPEN Vertically centered modal PUBLICAÇÃO-->
                            <div class="modal fade" id="editPublicacaoModal_{{ $item->id }}">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-heder">
                                            <h4 class="modal-title"> Editando {{ $item->titulo }}</h4>
                                        </div>

                                        <div class="modal-body">
                                            <form enctype="multipart/form-data" control
                                                action="{{ url('/publicacao/update', $item->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-goup">
                                                    <label for="titulo">Titulo:</label>
                                                    <input type="text" class="form-control" id="titulo" name="titulo"
                                                        placeholder="Titulo" value="{{ $item->titulo }}">
                                                </div>

                                                <div class="form-goup">
                                                    <label for="imagem">Imagem:</label>
                                                    <input type="file" class="form-control" id="imagem" name="imagem"
                                                        placeholder="">
                                                </div>

                                                <div class="form-goup">
                                                    <label for="descricao">Descrição:</label>
                                                    <textarea class="form-control" id="descricao" name="descricao" rows="5" placeholder="Descrição">{{ $item->descricao }}</textarea>
                                                </div>

                                                <div class="form-goup">
                                                    <input type="submit" class="btn btn-primary" value="Criar">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- CLOSE Vertically centered modal PUBLICAÇÃO-->
                        </div>
                    </div>
                </div>
            @empty
            @endforelse
        </div>




    </div>
@endsection

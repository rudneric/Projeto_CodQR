@extends('layouts.master')

@section('head')
@endsection

@section('navbar')
@endsection

@section('content')
    <!-- OPEN TABLE UTENSILIO-->
    <table class="table table-bordered caption-top">
        <caption>Lista de Utensilios</caption>
        <thead>
            <tr>
                <th scope="row ">ID</th>
                <th scope="col ">Nome</th>
                <th scope="col ">Quantidade</th>
                <th scope="col ">Resistencia</th>
                <th scope="col ">Opções</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($utensilio as $item)
                <tr>
                    <th scope="row text-center">{{ $item->id }}</th>
                    <td class="text-center ">{{ $item->uteNome }}</td>
                    <td class="text-center">{{ $item->quantidade }}</td>
                    <td class="text-center">{{ $item->resistencia }}</td>
                    <td class="text-center"><button class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#editUtensilioModal_{{ $item->id }}">Editar</button>
                        <form action="/utensilio/delete/{{ $item->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Deletar</button>
                        </form>
                    </td>
                </tr>

                <!-- OPEN Vertically centered modal UTENSILIO-->
                <div class="modal fade" id="editUtensilioModal_{{ $item->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-heder">
                                <h4 class="modal-title">Editando {{ $item->uteNome }}</h4>
                            </div>
                            <div class="modal-body">
                                <form action="{{ url('/utensilio/update', $item->id) }}" method="POST">

                                    @csrf
                                    @method('PUT')
                                    <div class="form-goup">
                                        <label for="uteNome">Nome:</label>
                                        <input type="text" class="form-control" id="uteNome" name="uteNome"
                                            placeholder="Nome" value="{{ $item->uteNome }}">
                                    </div>

                                    <div class="form-goup">
                                        <label for="quantidade">Quantidade:</label>
                                        <input type="text" class="form-control" id="quantidade" name="quantidade"
                                            placeholder="Quantidade" value="{{ $item->quantidade }}">
                                    </div>

                                    <div class="form-goup">
                                        <label for="resistencia">Resistencia:</label>
                                        <input type="text" class="form-control" id="resistencia" name="resistencia"
                                            placeholder="Resistencia" value="{{ $item->resistencia }}">
                                    </div>
                                    <input type="submit" class="btn btn-primary" value="Editar">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- CLOSE Vertically centered modal UTENSILIO-->
            @endforeach
        </tbody>
    </table>
    <!-- CLOSE TABLE UTENSILIO-->

    <!-- OPEN TABLE VIDEOS -->
    <table class="table table-bordered caption-top">
        <caption>Lista de videos</caption>
        <thead>
            <tr>
                <th scope="col ">ID</th>
                <th scope="col ">Titulo</th>
                <th scope="col ">Link</th>
                <th scope="col ">Opções</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($video as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td class="text-center">{{ $item->vidTitulo }}</td>
                    <td class="text-center">{{ $item->vidVideo }}</td>
                    <td class="text-center"><button class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#editVideoModal_{{ $item->id }}">Update</button>
                        <form action="/video/delete/{{ $item->id }}" method="POST">

                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Deletar</button>
                        </form>
                    </td>
                </tr>
                <!-- OPEN Vertically centered modal VIDEO-->
                <div class="modal fade" id="editVideoModal_{{ $item->id }}">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-heder">
                                <h4 class="modal-title">Editando {{ $item->vidTitulo }}</h4>
                            </div>
                            <div class="modal-body">
                                <form action="{{ url('/video/update', $item->id) }}" method="POST">

                                    @csrf
                                    @method('PUT')
                                    <div class="form-goup">
                                        <label for="vidTitulo">Titulo</label>

                                        <input type="text" class="form-control" id="vidTitulo" name="vidTitulo"
                                            placeholder="Titulo" value="{{ $item->vidTitulo }}">
                                    </div>

                                    <div class="form-goup">
                                        <label for="vidVideo">Link do Video</label>
                                        <input type="text" class="form-control" id="vidVideo" name="vidVideo"
                                            placeholder="Link" value="{{ $item->vidVideo }}">
                                    </div>
                                    {{-- <input type="submit" class="btn btn-primary" value="Editar"> --}}
                                    <button class="btn btn-primary"> Editar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- CLOSE Vertically centered modal VIDEO-->
            @endforeach
        </tbody>
    </table>
    <!-- CLOSE TABLE VIDEOS -->

    <!-- OPEN TABLE PUBICACAO -->
    <table class="table table-bordered caption-top">
        <caption>Lista de Publições</caption>
        <thead>
            <tr>
                <th scope="row ">ID</th>
                <th scope="col ">Titulo</th>
                <th scope="col ">Imagem</th>
                <th scope="col ">Descrição</th>
                <th scope="col ">Link do Video</th>
                <th scope="col ">Data Criação</th>
                <th scope="col ">Opções</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($publicacao as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td class="text-center">{{ $item->titulo }}</td>
                    <td class="text-center">{{ $item->imagem }}</td>
                    <td class="col-2 text-breake">{{ $item->descricao }}</td>
                    <td class="text-center">{{ $item->video }}</td>
                    <td class="text-center">{{ $item->created_at }}</td>
                    <td class="text-center"><button class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#editPublicacaoModal_{{ $item->id }}">Update</button>
                        <form action=" {{ url('/publicacao/delete', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>

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
                                        <textarea class="form-control" id="descricao" name="descricao" rows="5" placeholder="Descrição"
                                            >{{ $item->descricao }}</textarea>
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
            @endforeach
        </tbody>
    </table>
    <!-- CLOSE TABLE PUBLICACAO -->
@endsection

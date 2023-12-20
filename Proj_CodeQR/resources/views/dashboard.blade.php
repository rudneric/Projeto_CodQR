@extends('layouts.master')

@section('head')
@endsection

@section('navbar')
@endsection

@section('content')
    <div class="container">
        <div class="row mt-4">
            @forelse ($publicacao as $item)
                <div class="col col-sm-4">
                    <div class="card mt-2 mb-2" id="{{ $item->id }}">
                        <img src="{{ asset('img/publicacoes/' . $item->imagem) }}" class="img-fluid img-thumbnail">
                        <div class="card-body ">
                            <h5 class="card-title">{{ $item->titulo }}</h5>
                            <p class="card-text text-truncate">{{ $item->descricao }}</p>
                            @auth
                                <form class="d-inline-flex" action=" {{ url('/publicacao/delete', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger shadow-sm rounded"> <i class="bi bi-trash"></i> </button>
                                </form>
                                <a class="btn btn-primary shadow-sm  rounded" data-bs-toggle="modal"
                                    data-bs-target="#editPublicacaoModal_{{ $item->id }}"><i
                                        class="bi bi-pencil-square"></i></a>
                                <a href="/gerar-qrcode/{{ $item->id }}" class="btn btn-success shadow-sm rounded"><i
                                        class="bi bi-qr-code"></i></a>

                            @endauth
                            <a href="/ver/publicacao/{{ $item->id }}"
                                class="btn  btn-outline-warning shadow-sm rounded">Mais</a>

                            <!-- OPEN Vertically centered modal EDITAR PUBLICAÇÃO-->
                            <div class="modal fade" id="editPublicacaoModal_{{ $item->id }}">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-heder">
                                            <h4 class="modal-title text-center"> Editando {{ $item->titulo }}</h4>
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
                                                    <label for="descricao">Descrição:</label>
                                                    <textarea class="form-control" id="descricao" name="descricao" rows="5" placeholder="Descrição">{{ $item->descricao }}</textarea>
                                                </div>

                                                <div class="form-goup">
                                                    <input type="submit" class="btn btn-primary mt-3" value="Criar">
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

        <button class="btn btn-success btn-lg border-0 rounded" onclick="redirecionarParaCamera()"><i class="bi bi-camera"></i></button>

    <script>
        // Função para redirecionar para a página com o leitor de QR Code
        function redirecionarParaCamera() {
            window.location.href = '/scan/qrcode';
            // NOTA: O redirecionamento pode ser instantâneo, 
            // então a câmera pode iniciar assim que a página index.html for carregada.
        }
    </script>

       
    </div>
@endsection

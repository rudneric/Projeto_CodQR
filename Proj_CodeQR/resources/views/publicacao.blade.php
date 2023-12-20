@extends('layouts.master')

@section('title', $publicacao->title)
@endsection

@section('content')
<div class="container-fluid col-md-6 offset-md-1">
    <div class="row">
        <div id="embed-responsive embed-responsive-16by9 ">

            @php
                // Suponha que $url seja a variável que contém a URL do banco de dados
                $url = $publicacao->video; // Substitua pela forma correta de acessar a URL no seu contexto

                // Limpeza e conversão para entidades HTML
                $cleanedUrl = htmlspecialchars($url, ENT_QUOTES, 'UTF-8');
            @endphp
            <iframe class="embed-responsive-item" src="<?= $cleanedUrl ?>" title="youtube video"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>
            <h3>{{ $publicacao->titulo }}</h3>

            <div id="descricao-container" class="col-md-11 justify-end">
                <h6>Publicado em: {{ $publicacao->created_at }}</h6>
                <p>{{ $publicacao->descricao }}</p>
            </div>

        </div>
        {{-- <img src="{{ asset('img/gifs' . $publicacao->gif) }}" alt="Imagem"> --}}


        {{-- <img src="{{ asset('img/gifs/' . $publicacao->gif) }}" alt=""> --}}

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

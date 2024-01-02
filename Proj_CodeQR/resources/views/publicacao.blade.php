@extends('layouts.master')

@section('title', $publicacao->title)
@endsection

<style>
@media only screen and (min-width: 200px) and (max-width: 767px) {
    #yt-video {
        justify-content: center;
        width: 100%;
        height: 22vh;
    }
}

@media only screen and (min-width: 750px) and (max-width: 2560px) {
    #yt-video {
        justify-content: center;
        width: 100%;
        height: 35vh;

    }
}

@media only screen and (min-width: 1024px) and (max-width: 2560px) {
    #yt-video {
        justify-content: center;
        width: 100%;
        height: 85vh;

    }
}

#container-master {
    align-items: center;

}
</style>

@section('content')
<div class="container" id="container-1">
    <div class="container-fluid" id="content-container">
        <div class="row">
            @php
                // Suponha que $url seja a variável que contém a URL do banco de dados
                $url = $publicacao->video; // Substitua pela forma correta de acessar a URL no seu contexto

                // Limpeza e conversão para entidades HTML
                $cleanedUrl = htmlspecialchars($url, ENT_QUOTES, 'UTF-8');
            @endphp
            <iframe id="yt-video" class="mt-3" src="<?= $cleanedUrl ?>" title="youtube video" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>

            
                <button class="btn btn-lg btn-outline-warning  rounded-pill shadow-sm mt-3 rounded mt-2 mb-2"
                    onclick="redirecionarParaCamera()"> Leitor </button>

            <h3>{{ $publicacao->titulo }}</h3>
            <div class="">
                <div class="">
                    <h6>Publicado em: {{ $publicacao->created_at }}</h6>
                    <p style="width: 100%; height: 100%;">{{ $publicacao->descricao }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Função para redirecionar para a página com o leitor de QR Code
    function redirecionarParaCamera() {
        window.location.href = '/scan/qrcode';
    }
</script>
@endsection

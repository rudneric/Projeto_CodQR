<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div id="video-create-container" class="col-md-6 offset-md-3">
        <h1>Cadastre seu Utensilio</h1>
        <form action="{{ '/video/store' }}" method="POST">
            @csrf
            <div class="form-goup">
                <label for="vidTitulo">Titulo</label>
                <input type="text" class="form-control" id="vidTitulo" name="vidTitulo" placeholder="Titulo">
            </div>
            @csrf
            <div class="form-goup">
                <label for="vidVideo">Link do Video</label>
                <input type="text" class="form-control" id="vidVideo" name="vidVideo" placeholder="Link">
            </div>
            <input type="submit" class="btn btm-primary" value="Cadastrar">
        </form>
    </div>
</body>

</html>

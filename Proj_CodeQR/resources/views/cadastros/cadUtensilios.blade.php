<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <title>Document</title>
</head>
<body>
    <div id="utensilio-create-container" class="col-md-6 offset-md-3">
        <h1>Cadastre seu Utensilio</h1>
        <form action="{{('/adm/cadastros')}}" method="POST">
            @csrf
            <div class="form-goup">
                <label for="uteNome">Nome:</label>
                <input type="text" class="form-control" id="uteNome" name="uteNome" placeholder="Nome">
            </div>
            @csrf
            <div class="form-goup">
                <label for="quantidade">Quantidade:</label>
                <input type="text" class="form-control" id="quantidade" name="quantidade" placeholder="Quantidade">
            </div>
            @csrf
            <div class="form-goup">
                <label for="resistencia">Resistencia:</label>
                <input type="text" class="form-control" id="resistencia" name="resistencia" placeholder="Resistencia">
            </div>
            <input type="submit" class="btn btm-primary" value="Criar Utensilio">
        </form>
    </div>
</body>
</html>
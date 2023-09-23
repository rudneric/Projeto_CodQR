<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
    <div id="registro-create-container" class="col-md-6 offset-md-3">
        <form action="/register" method="POST">
            @csrf
            <div class="form-goup">
                <label for="admNome">Nome</label>
                <input type="text" class="form-control" id="admNome" name="admNome" placeholder="Nome">
            </div>
            
            <div class="form-goup">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
            </div>
        
            <div class="form-goup">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
            </div>
        
            <input type="submit" class="btn btm-primary" value="Cadastrar">
        </form>
    </div>
</body>
</html>
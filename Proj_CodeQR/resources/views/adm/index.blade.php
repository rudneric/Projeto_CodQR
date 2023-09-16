<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <form action="/cadastros" method="post">
        @csrf 
        @error('matricula')
           {{$message}}
       @enderror
   <label for="">Matricula</label>
   <input type="text" name="matricula" id="matricula">

       @error('senha')
           {{$message}}
       @enderror
   <label for="">Senha</label>
   <input type="text" name="senha" id="senha">
    <button>Enviar</button>
    </form> 
</body>
</html>
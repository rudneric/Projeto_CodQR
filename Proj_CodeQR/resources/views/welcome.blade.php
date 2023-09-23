<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    </head>
    <body class="antialiased">
        <a href="{{url ('/adm/cadastros') }}"><button>Cadastros</button></a>
        <a href="{{url ('/login') }}"><button>login</button></a>     
        <a href="{{url ('/register') }}"><button>Cad Admin</button></a>   
    </body>
</html>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    @yield('head')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link rel="shortcut icon" type="imagex/png" href="/img/img_site/logo_oficial.png">
    <title>@yield('title')SAB</title>
</head>

<body>
    <div class="container-fluid " style="background: white">
        @yield('navbar')
        <nav class="navbar navbar-expand-lg shadow-5-strong">
            <div class="container-fluid">
                <a class="navbar-brand" href="/dashboard"><img src="/img/img_site/logo_oficial.png" width="70"
                        height="70" alt=""></a>

                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="bi mobile-nav-toggle bi-list border-0"></i>
                </button>

                {{-- telinha do hamburge --}}
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="/dashboard">Home</a>
                        </li>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link text-dark nav-inline-primary" href="{{ route('login') }}">Adm</a>
                            </li>
                        @endguest

                        @auth
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="{{ route('register') }}">Novo Adm</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-dark" href="/exibe/itens/banco">Itens Cadastrados</a>
                            </li>

                            {{-- dropdown de cadastros --}}
                            <div class="dropdown">
                                <button class="btn btn-transparent dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Cadastros
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="/cadastro/utensilio">Utensilio</a>
                                    <a class="dropdown-item " href="/cadastro/video">Video</a>
                                    <a class="dropdown-item" href="/cadastro/publicacao">Publicação</a>
                                </div>
                            </div>
                        @endauth
                    </ul>
                </div>
                <!-- Dropdown perfil do usuário -->
                @auth
                    <div class="dropdown">
                        <button class="btn btn-transparent dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route('register') }}">Novo User</a>
                            <div class="dropdown-divider"></div>
                            <form action="{{ url('/logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">sair</button>
                            </form>
                        </div>
                    </div>
                @endauth
            </div>
        </nav>
    </div>

    <div class="container" id="container-master">
        @yield('content')
        
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>

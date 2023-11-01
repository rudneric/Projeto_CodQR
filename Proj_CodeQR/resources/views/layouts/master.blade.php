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
    
    <title>@yield('title')MUL</title>
</head>

<body>
    <div class="container-fluid">
        @yield('navbar')
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="/dashboard">MUL</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/dashboard">Página Inicial</a>
                        </li>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                        @endguest

                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Novo User</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="/exibe/itens/banco">Itens Cadastrados</a>
                            </li>

                            <div class="dropdown">
                                <button class="btn btn-transparent dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Cadastros
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <button class="dropdown-item btn btn-target" data-bs-toggle="modal"
                                        data-bs-target="#createUtensilioModal">Utensilio</button>
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
                            <a class="dropdown-item" href="#">Alguma ação</a>
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

    <div class="container">
        @yield('content')
        {{-- MODAL CADASTRO DE UTENSILIO --}}
        <div class="modal fade" id="createUtensilioModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-heder">
                        <h4 class="modal-title">Cadastrando de Utensilio</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{ '/utensilio/store' }}" method="POST">
                            @csrf
                            <div class="form-goup">
                                <label for="uteNome">Nome:</label>
                                <input type="text" class="form-control" id="uteNome" name="uteNome"
                                    placeholder="Nome">
                            </div>

                            <div class="form-goup">
                                <label for="quantidade">Quantidade:</label>
                                <input type="text" class="form-control" id="quantidade" name="quantidade"
                                    placeholder="Quantidade">
                            </div>

                            <div class="form-goup">
                                <label for="resistencia">Resistencia:</label>
                                <select type="text" class="form-control" id="resistencia" name="resistencia">
                                    <option>Selecione</option>
                                    <option value="Frágil">Frágil</option>
                                    <option value="Médio">Médio</option>
                                    <option value="Forte">Forte</option>
                            </div>
                            <input type="submit" class="btn btm-primary" value="Criar Utensilio">
                        </form>
                    </div>
                </div>
            </div>
        </div>


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

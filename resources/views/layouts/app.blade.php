<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

    <title> @yield('title') </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('inicio') }}">
                    <i class="bi-bootstrap h4"></i>
                </a>

                <a class="navbar-brand" href="{{ route('inicio') }}"> Início </a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('user.comidas.index') }}"> Comidas </a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('user.bebidas.index') }}"> Bebidas </a>
                        </li>
                        
                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li> --}}
                    </ul>

                    @if (!auth()->check()) {{-- Se não estiver autenticado --}}
                        <a class="btn btn-success" href="{{ route('login') }}"> Login </a>
                        <a class="btn btn-info mx-2" href="{{ route('user.usuarios.create') }}"> Registrar </a>
                    @else
                        {{-- Ve os atributos do usuario logado, se for um usuario que esta logado --}}
                        @isset(auth()->user()->usuarios()->first()->id)
                            <a href="{{ route('user.usuarios.show', auth()->user()->usuarios()->first()->id) }}" class="text-info mx-2"> Meu perfil </a>
                        @endisset

                        {{-- Se for funcionario --}}
                        @if (auth()->user()->funcionario)
                            {{-- <a class="mx-4 my-0" href="#" title="Alterar partes do site"><i class="bi-gear text-white h4"></i></a> --}}
                            <a class="btn btn-success" href="{{ route('admin.dashboard') }}"> Dashboard </a>
                        @endif

                        <a class="btn btn-danger mx-2" href="{{ route('logout.pessoa') }}"> Sair </a>
                    @endif

                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
        
        <footer class="py-4 bg-dark text-white text-muted text-center">
            <i class="bi-bootstrap h4 mx-1"></i> &copy 2022 Eduardo
        </footer>
    </div>
</body>
</html>

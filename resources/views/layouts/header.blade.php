<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="/css/dropdown.css">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Thambi+2&display=swap" rel="stylesheet" />
    @yield('css')
    <link rel="icon" href="/logo/lilas-2.PNG">
    <script src="/js/modo_escuro.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />


    <title>@yield('title', 'FoxServ')</title>
</head>

<body>
    <!-- Cabeçalho -->
    <nav class="nav">
        <div class="container">
            @if (session('tipo') === 'comum')
            <h1 class="logo"><a href="{{ route('index') }}">Fox<span class="foxserv">Serv</span></a></h1>
            @elseif (session('tipo') === 'profissional')
            <h1 class="logo"><a href="{{ route('homeProfissional') }}">Fox<span class="foxserv">Serv</span></a></h1>
            @else
            <h1 class="logo"><a href="{{ route('login') }}">Fox<span class="foxserv">Serv</span></a></h1>
            @endif
            @auth

            <ul>
                <div class="dropdown">
                    <button class="menu"><img class="foto_menu" src="/{{ Auth::user()->profilePic }}"> Olá,
                        {{Auth::user()->name}}<span class="material-symbols-outlined">
                            expand_more
                        </span> 
                    </button>
                    <div class="dropdown-content">
                        @if (session('tipo') === 'comum')
                        <ul><a href="{{ route('index') }}"><span class="material-symbols-outlined">
                                    home
                                </span>Home</a>
                            <a href="{{ route('contratoUsuario') }}"><span class="material-symbols-outlined">
                                    description
                                </span>Serviços Contratados</a>
                            <a href="{{ route('editarDadosUsuario') }}"><span class="material-symbols-outlined">
                                    edit
                                </span>Editar Dados</a>
                            <a href="{{ route('redefinirSenha') }}"><span class="material-symbols-outlined">
                                    lock_reset
                                </span>Redefinir Senha</a>
                            <a href="{{ route('sejaProfissional') }}"><span class="material-symbols-outlined">
                                    person
                                </span>Seja um Profissional</a>

                            <a class="sair" href="{{ route('logout')}}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span
                                    class="material-symbols-outlined">
                                    logout
                                </span>Sair</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                        @elseif (session('tipo') === 'profissional')
                        <ul>
                            <a href="{{ route('meuPerfil')}}"><span class="material-symbols-outlined">
                                    person
                                </span>Meu Perfil</a>
                            <a href="{{ route('homeProfissional')}}"><span class="material-symbols-outlined">
                                    home
                                </span>Home</a>
                            <a href="{{ route('contratoProfissional')}}"><span class="material-symbols-outlined">
                                    description
                                </span>Meus Contratos</a>

                            <!-- Notificações -->
                            <li>
                                <span class="material-symbols-outlined">notifications</span> Notificações
                                <ul>
                                        @foreach ($curtidas ?? [] as $curtida)
                                            <li>
                                                <img class="foto_menu" src="{{ asset($curtida->profilePic) }}" alt="Foto do usuário">
                                                {{ $curtida->name }} {{ $curtida->lastName }}<br>
                                                Curtiu sua Publicação
                                                {{ \Carbon\Carbon::parse($curtida->likeDate)->format('d/m/Y') }}
                                                <span class="material-symbols-outlined">favorite</span>
                                            </li>
                                            <hr>
                                        @endforeach

                                        @foreach ($avaliacoes ?? [] as $avaliacao)
                                            <li>
                                                <img class="foto_menu" src="{{ asset($avaliacao->profilePic) }}" alt="Foto do usuário">
                                                {{ $avaliacao->name }} {{ $avaliacao->lastName }}<br>
                                                Avaliou seu serviço <br>
                                               {{ \Carbon\Carbon::parse($avaliacao->ratingDate)->format('d/m/Y') }}
                                                <span class="material-symbols-outlined">star</span>
                                            </li>
                                            <hr>
                                        @endforeach
                                    </ul>
                            </li>

                            <a class="sair" href="{{ route('logout')}}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span
                                    class="material-symbols-outlined">
                                    logout
                                </span>Sair</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                        @endif
                        @endauth
                        @auth
                        <a class="login" href="{{ route('login') }}"><span class="material-symbols-outlined">
                                login
                            </span> Sair </a>


                        @else
                        <a class="sejaProf" href="{{ route('index') }}" class="current">Home</a>
                        <a class="sejaProf" href="{{ route('cadastro') }}">Cadastre-se</a>

                        <p class="linha"> | </p>

                        <a class="login" href="{{ route('login') }}"><span class="material-symbols-outlined">
                                login
                            </span> Entrar </a>
                        @endauth
                        
                    </div>
                    <div>
                        <input type="checkbox" name="change-theme" id="change-theme" />
                        <label for="change-theme">
                            <i class="bi bi-sun"></i>
                            <i class="bi bi-moon"></i></label>
                    </div>
                </div> 
            </ul>
        </div>
    </nav>

    @yield('content')

</body>
@yield('footer')
</html>

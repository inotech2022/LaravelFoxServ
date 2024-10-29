<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css?family=Baloo+Thambi+2&display=swap" rel="stylesheet" />
    @yield('css')
    <link rel="icon" href="/logo/lilas-2.PNG">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    
    <script src="js/modo_escuro.js" defer></script>
    
        <title>@yield('title', 'FoxServ')</title>
</head>

<body>
    <!-- cabeçalho -->
          <nav class="nav">
        <div class="container">
        <h1 class="logo"><a href="home.php"> Fox<span class="foxserv">Serv</span></a></h1>
        @auth   
        <ul>           
                <div class="dropdown">
<button class="menu"><img class="foto_menu" src="image/upload/"> Olá, {{Auth::user()->name}}<span
                        class="material-symbols-outlined">
                        expand_more
                    </span> </button>
                    <div class="dropdown-content">
                        <ul><a href="{{ route('home') }}"><span class="material-symbols-outlined">
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
                                
                            <a class="sair" href="{{ route('logout')}}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="material-symbols-outlined">
                                logout
                            </span>Sair</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form></ul>
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
                <div>
                                             </div>
                    </div>
                <div>
                    <input type="checkbox" name="change-theme" id="change-theme" />
                    <label for="change-theme">
                        <i class="bi bi-sun"></i>
                        <i class="bi bi-moon"></i></label>
                </div>
            </ul>
        </div>
    </nav>
    <main>

    @yield('content')
    </main>

   </body>
</html>
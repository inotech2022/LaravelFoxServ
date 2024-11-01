<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="/js/modo_escuro.js" defer></script>
    <script src="/js/limiteTexto.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <title>@yield('title', 'FoxServ')</title>
</head>

<body>


    <div class="main">
        <div class="left">
            <div class="logo-header">

            @if (session('tipo') === 'comum')
    <h1 class="logo"><a href="{{ route('home') }}">Fox<span class="foxserv">Serv</span></a></h1>
@elseif (session('tipo') === 'profissional')
    <h1 class="logo"><a href="{{ route('homeProfissional') }}">Fox<span class="foxserv">Serv</span></a></h1>
@endif
                <div class="modo_escuro">
                    <input type="checkbox" name="change-theme" id="change-theme" />
                    <label for="change-theme">
                        <i class="bi bi-sun"></i>
                        <i class="bi bi-moon"></i></label>
                </div>
            </div>
                
                @yield('content')
               
</body>

</html>
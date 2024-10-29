<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/cad_servico.css">
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

                <h1 class="logo"><a href="homeProf.php"> Fox<span class="foxserv">Serv</span></a></h1>
                <div class="modo_escuro">
                    <input type="checkbox" name="change-theme" id="change-theme" />
                    <label for="change-theme">
                        <i class="bi bi-sun"></i>
                        <i class="bi bi-moon"></i></label>
                </div>
            </div>
            <form class="card-form" action="cad_servico.php" method="POST" enctype="multipart/form-data">
                <h1> @yield('cadastro', 'Formulário')</h1>
                @yield('content')
                </form>
        </div>
        <div class="right">
            <img src="image/novoServ-modoClaro.png" class="img-right-modoClaro">
            <img src="image/novoServ-modoEscuro.png" class="img-right-modoEscuro">
        </div>
    </div>
</body>

</html>
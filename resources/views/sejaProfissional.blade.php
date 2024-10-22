<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/sejaProfissional.css') }}">
    <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
    <link rel="icon" href="{{ asset('logo/lilas-2.PNG') }}">
    <script src="{{ asset('js/modo_escuro.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <title>Seja um Profissinal</title>
</head>

<body>


    <div class="main">
        <div class="left">
            <div class="logo-header">

                <h1 class="logo"><a href="{{ route('home') }}"> Fox<span class="foxserv">Serv</span></a></h1>
                <div class="modo_escuro">
                    <input type="checkbox" name="change-theme" id="change-theme" />
                    <label for="change-theme">
                        <i class="bi bi-sun"></i>
                        <i class="bi bi-moon"></i></label>
                </div>
            </div>
            <div class="estatica">
                <div class="texto">
                    <h1>
                        Seja um profissional <br> e faça parte da nossa equipe
                    </h1>
                    <p>Complete seu cadastro e desfrute dos benefícios</p>
                </div>
                <div class="beneficios">
                    <div class="card">
                        <div class="icone">
                            <span class="material-symbols-outlined">
                                work_history
                                </span>

                        </div>
                        <div class="beneficio">
                            <p>Trabalhe no horário desejado</p>
                        </div>

                    </div>
                    <div class="card2">
                        <div class="icone">
                            <span class="material-symbols-outlined">
                                payments
                                </span>

                        </div>
                        <div class="beneficio">
                            <p>Negocie valores direto com seu cliente</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="icone">
                            <span class="material-symbols-outlined">
                                star
                                </span>

                        </div>
                        <div class="beneficio">
                            <p>Receba avaliações e divulgue serviços</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="right">
            <img src="image/telaEstatica-modoClaro.svg" class="img-right-modoClaro">
            <img src="image/telaEstatica-modoEscuro.svg" class="img-right-modoEscuro">
            <div class="botao">
                <button onclick="document.location='{{ route('cadastroProfissional') }}'">Quero ser profissional!</button>
                <a href="{{ route('home') }}">Não, obrigado.</a>
            </div>
        </div>
    </div>

</body>

</html>

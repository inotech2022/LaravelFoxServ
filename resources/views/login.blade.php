<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="icon" href="{{ asset('logo/lilas-2.PNG') }}">
    <script src="{{ asset('js/modo_escuro.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <title>Login</title>
</head>

<body>
    <div class="main_gradiente">
        <div class="main">
            <div class="left">
                <div class="logo-header">
                    <h1 class="logo">
                        <a href="{{ route('index') }}">Fox<span class="foxserv">Serv</span></a>
                    </h1>
                    <div class="modo_escuro">
                        <input type="checkbox" name="change-theme" id="change-theme" />
                        <label for="change-theme">
                            <i class="bi bi-sun"></i>
                            <i class="bi bi-moon"></i>
                        </label>
                    </div>
                </div>
                @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <a>{{ $error }}</a>
            @endforeach
        </ul>
    </div>
@endif
                <form class="card-form" action="{{ route('login') }}" method="POST">
                    @csrf
                    <h1>Login</h1>
                    <div class="linha">
                        <div class="textfield">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" placeholder="Insira seu e-mail" required maxlength="50">
                        </div>
                    </div>
                    <div class="linha">
                        <div class="textfield">
                            <label for="password">Senha</label>
                            <input type="password" name="password" placeholder="Insira sua senha" required maxlength="30">
                        </div>
                    </div>

                    <div class="cadastro">
                        <a class="esqueceu_a_senha" href="{{ route('esqueceuSenha') }}">Esqueceu a senha?</a>
                    </div>
                    <div class="botao">
                        <input type="submit" name="submit" class="btn-login" id="submit" value="Entrar">
                    </div>
                    <div class="cadastro">
                        <label for="cadastro">Ainda não tem um cadastro?</label>
                        <a class="cadastrar_se" href="{{ route('cadastro') }}">Cadastrar-se</a>
                    </div>
                </form>
            </div>
            <div class="right">
                <img src="{{ asset('https://foxservbucket.s3.us-east-1.amazonaws.com/login-modoClaro.png') }}" class="img-right-modoClaro">
                <img src="{{ asset('https://foxservbucket.s3.us-east-1.amazonaws.com/login-modoEscuro.png') }}" class="img-right-modoEscuro">
            </div>
        </div>
    </div>
</body>
</html>

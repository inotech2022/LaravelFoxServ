<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="redSenha.css">
    <script src="confirmaSenha.js" defer></script>
    <link rel="icon" href="logo/lilas-2.PNG">
    <script src="/resources/js/modo_escuro.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <title>Redefinir Senha</title>
</head>

<body>


    <div class="main">
        <div class="left">
            <div class="logo-header">
<h1 class="logo"><a href="home.php"> Fox<span class="foxserv">Serv</span></a></h1>
<h1 class="logo"><a href="homeProf.php"> Fox<span class="foxserv">Serv</span></a></h1>
                <div class="modo_escuro">
                    <input type="checkbox" name="change-theme" id="change-theme" />
                    <label for="change-theme">
                        <i class="bi bi-sun"></i>
                        <i class="bi bi-moon"></i></label>
                </div>
            </div>
            <form class="card-form" action="redSenha.php" method="POST" enctype="multipart/form-data" >
                <h1>Redefinir Senha</h1>
                <div class="linha">
                    <div class="textfield">
                        <label for="senha">Senha Antiga</label>
                        <input type="password" name="senha_antiga" placeholder="digite sua senha antiga" required
                            maxlength="30" minlength="8">
                    </div>
                </div>
                <div class="linha">

                    <div class="textfield">
                        <label for="senha">Nova Senha</label>
                        <input type="password" name="senha" placeholder="insira sua senha" required maxlength="30"
                            minlength="8">
                    </div>
                    <div class="textfield">
                        <label for="senha">Confirme a senha</label>
                        <input type="password" name="senha2" placeholder="confirme sua senha" required maxlength="30"
                            minlength="8">
                    </div>
                </div>

                <div class="botao">
                    <input type="submit" name="submit" class="btn-login" id="submit" value="Redefinir">
                </div>
            </form>
        </div>
        <div class="right">
            <img src="image/senha-modoClaro.png" class="img-right-modoClaro">
            <img src="image/senha-modoEscuro.png" class="img-right-modoEscuro">
        </div>
    </div>
</body>
</html>
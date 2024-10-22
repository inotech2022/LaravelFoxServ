<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/resources/css/esqueci_senha.css">
    <link rel="icon" href="logo/lilas-2.PNG">
    <script src="/resources/js/modo_escuro.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <title>Esqueceu a senha</title>
</head>

<body>

    <div class="main_gradiente">
        <div class="main">
        <div class="left">
            <div class="logo-header">

                <h1 class="logo"><a href="index.php"> Fox<span class="foxserv">Serv</span></a></h1>
                <div class="modo_escuro">
                    <input type="checkbox" name="change-theme" id="change-theme" />
                    <label for="change-theme">
                      <i class="bi bi-sun"></i>
                      <i class="bi bi-moon"></i
                    ></label>
                  </div>
            </div>
            <form class="card-form" action="esqueci_senha.php" method="POST" enctype="multipart/form-data" >
                <h1>Esqueci a senha </h1>
                <h2> Enviaremos uma nova senha para o seu e-mail</h2>
                <div class="linha">
                    <div class="textfield">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" placeholder="Insira seu e-mail" required maxlength="50">
                    </div>
                </div>


                <div class="botao">
                  <input type="submit" name="submit" class="btn-login" id="submit" value="Enviar">
                </div>
                <div class="cadastro">
                    <a class="voltar" href="login.php">Voltar</a>
                </div>

            </form>
        </div>
        <div class="right">
            <img src="image/senha-modoClaro.png" class="img-right-modoClaro">
            <img src="image/senha-modoEscuro.png" class="img-right-modoEscuro">
        </div>
    </div>
</div>
</body>
</html>

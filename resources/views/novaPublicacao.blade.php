<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="novoPost.css">
    <link rel="icon" href="logo/lilas-2.PNG">
    <script src="/resources/js/novoPost.js" defer></script>
    <script src="/resources/js/limiteTexto.js" defer></script>
    <script src="/resources/js/modo_escuro.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <title>Nova Publicação</title>
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
            <form class="card-form" method="POST" enctype="multipart/form-data">
                <h1>Nova Publicação </h1>
                <div class="foto-publicacao">
                    <label class="picture" for="picture__input" tabIndex="0">
                        <span class="picture__image"></span>
                      </label>
                      
                      <input type="file" name="picture__input" id="picture__input">
                </div>
                

                <div class="linha">
                    <div class="input-box">
                        <label for="legenda">Legenda</label>
                        <textarea name="descricao" placeholder="Escreva a sua legenda..." required maxlength="100"></textarea>
                        
                        <div class="characters">
                          <span class="min_num">0</span>
                          <span class="limit_num">/100</span>
                        </div>
                      </div>
                      <div class="invisivel">
<input type="text" name="idProfissional" class="invisivel" value=""></input>
</div>
                </div>
                <div class="botao">
                    <input type="submit" name="submit" class="btn-login" id="submit" value="Publicar">
                </div>
                <a class="voltar" href="FeedProf.php">Voltar</a>
            </form>
        </div>
        <div class="right">
            <img src="image/novaPub-modoClaro.png" class="img-right-modoClaro">
            <img src="image/novaPub-modoEscuro.png" class="img-right-modoEscuro">
        </div>
    </div>
   


</body>

</html>
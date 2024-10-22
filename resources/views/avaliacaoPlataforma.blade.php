<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/resources/css/avaliacao.css">
    <link rel="icon" href="logo/lilas-2.PNG">
    <script src="modo_escuro.js" defer></script>
    <script src="avaliacao.js" defer></script>
    <script src="limiteTexto.js" defer></script>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <title>Avaliar Profissional</title>
</head>

<body>


    <div class="main">
        <div class="left">
            <div class="logo-header">
                <div class="modo_escuro">
                    <input type="checkbox" name="change-theme" id="change-theme" />
                    <label for="change-theme">
                        <i class="bi bi-sun"></i>
                        <i class="bi bi-moon"></i></label>
                </div>
            </div>
            <form class="card-form" method="POST" enctype="multipart/form-data">

                <h1>Avalie a plataforma</h1>
                <p>O que você está achando da nossa plataforma?</p>
                <div class="linha">
                    <div class="textfield">
                    <label for="avaliacao">Avaliação <span class="required"> * </span></label>
                <div class="estrelas">
                    <input type="radio" id="vazio" name="estrela" value="" checked>

                    <label for="estrela_um"><i class="fa"></i></label>
                    <input type="radio" id="estrela_um" name="estrela" value="1">

                    <label for="estrela_dois"><i class="fa"></i></label>
                    <input type="radio" id="estrela_dois" name="estrela" value="2">

                    <label for="estrela_tres"><i class="fa"></i></label>
                    <input type="radio" id="estrela_tres" name="estrela" value="3">

                    <label for="estrela_quatro"><i class="fa"></i></label>
                    <input type="radio" id="estrela_quatro" name="estrela" value="4">

                    <label for="estrela_cinco"><i class="fa"></i></label>
                    <input type="radio" id="estrela_cinco" name="estrela" value="5"><br><br>

                </div>
                </div>
                </div>
                <div class="linha">
                    <div class="input-box">
                        <label for="comentario">Comentário <span class="required"> * </span></label>
                        <textarea name="comentario" placeholder="Comentário referente à avaliação" required maxlength="100"></textarea>

                        <div class="characters">
                          <span class="min_num">0</span>
                          <span class="limit_num">/100</span>
                        </div>
                      </div>
               </div>
                <div class="botao">
                    <input type="submit" name="submit" class="btn-login" id="submit" value="Avaliar">
                </div>

                <a class="voltar" href="home.php">Voltar</a>


            </form>
        </div>
        <div class="right">
            <img src="image/avaliaçao-modoClaro.png" class="img-right-modoClaro">
            <img src="image/avaliaçao-modoEscuro.png" class="img-right-modoEscuro">
        </div>
    </div>

</body>

</html>

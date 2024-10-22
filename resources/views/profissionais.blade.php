<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Thambi+2&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="profissionais.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="icon" href="logo/lilas-2.PNG">
    <script src="/resources/js/modo_escuro.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <title>Profissionais</title>
</head>

<body>
    <!-- cabeçalho -->
    <nav class="nav">
        <div class="container">
                   <h1 class="logo"><a href="home.php"> Fox<span class="foxserv">Serv</span></a></h1>
            <ul>

                <div class="dropdown">
                <button class="menu"><img class="foto_menu" src="upload/"> Olá,<span
                        class="material-symbols-outlined">
                        expand_more
                    </span> </button>
                    <div class="dropdown-content">
                        <ul><a href="home.php"><span class="material-symbols-outlined">
                            home
                            </span>Home</a>
                        <a href="contrato_cliente.php"><span class="material-symbols-outlined">
                            description
                            </span>Serviços Contratados</a>
                            <a href="editarCliente.php"><span class="material-symbols-outlined">
                                edit
                                </span>Editar Dados</a>
                                <a href="telaEstatica.html"><span class="material-symbols-outlined">
                                person
                                </span>Seja um Profissional</a>

                            <a class="sair" href="sair.php"><span class="material-symbols-outlined">
                                logout
                            </span>Sair</a></ul>
                        <ul>
                        <a href="FeedProf.php"><span class="material-symbols-outlined">
                                    person
                                </span>Meu Perfil</a>
                            <a href="homeProf.php"><span class="material-symbols-outlined">
                                    home
                                </span>Home</a>
                            <a href="contratos.php"><span class="material-symbols-outlined">
                                    description
                                </span>Meus Contratos</a>


                                <li><span class="material-symbols-outlined">
                                    notifications
                                </span>Notificações
                                <ul>

                                    <li><img class="foto_menu" src="image/foto_instagram.jpg"> Usuario <br>Curtiu sua Publicação<span class="material-symbols-outlined">
                                            favorite
                                        </span></li>
                                    <hr>
                                    <li><img class="foto_menu" src="image/foto_instagram.jpg"> Usuario <br>Avaliou seu serviço<span class="material-symbols-outlined">
                                            star
                                        </span></li>
                                    <hr>
                                    <li><img class="foto_menu" src="image/foto_instagram.jpg"> Usuario <br>Curtiu sua Publicação<span class="material-symbols-outlined">
                                            favorite
                                        </span></li>
                                    <hr>
                                    <li><img class="foto_menu" src="image/foto_instagram.jpg"> Usuario <br>Avaliou seu serviço<span class="material-symbols-outlined">
                                            star
                                        </span></li>
                                    <hr>
                                    <li><img class="foto_menu" src="image/foto_instagram.jpg"> Usuario <br>Curtiu sua Publicação <span class="material-symbols-outlined">
                                            favorite
                                        </span></li>
                                    <hr>

                                </ul>
                            </li>
                            <a class="sair" href="sair.php"><span class="material-symbols-outlined">
                                    logout
                                </span>Sair</a>
                        </ul>
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
        <div class="principal">
            <div class="topo">
                <div class="titulo">
                    <h1>NOSSOS PROFISSIONAIS</h1>
                    <p>Nossos profissionais disponíveis nessa categoria</p>
                </div>
                <form method="GET" >
                <div class="cidade">
    <p>cidade</p>
    <select name="cidade" onchange="this.form.submit()">
        <option value="" selected disabled>Escolha a cidade</option>
    </select>
</div>
<div class="estrela">
    <p>avaliação</p>
    <select name="media" onchange="this.form.submit()">
        <option value="" selected disabled>Avaliações</option>
        <option value="1">1 estrela</option>
        <option value="2">2 estrelas</option>
        <option value="3">3 estrelas</option>
        <option value="4">4 estrelas</option>
        <option value="5">5 estrelas</option>

    </select>

</div>
</form>
            </div>
            <div class="profissionais">
                <div  class="card_perfil ">
                    <div class="img-perfil">
                        <img class="img-profile" src="upload/">
                    </div>
                    <div class="informacoes">
                        <h2 class="username"></h2>
                        <p class="localizacao">
                            <span class="iconeee">
                                location_on
                            </span>
                        </p>
                       <div class="row">
    <div class="descricao">
        <p class="profile-desc"></p>
    </div>
    <ul class="avaliacao">
        <label class="media"></label>
    </ul>
</div>
                    </div>
                    <button onclick="document.location='FeedUsuario.php?idProfissional=<?php echo $idProfissional[$i]; ?>'" class="btn-perfil">Ver perfil</button>

                </div>
            </div>
        </div>
    </main>
</body>
<footer class="footer">
    <div class="footer_left">
        <div class="footer__links">
            <a class="footer__link" href="https://www.instagram.com/inotech_ds/" target="__blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class=" bi-instagram"
                    viewBox="0 0 16 16">
                    <path
                        d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                </svg>
                @inotech_ds
            </a>
            <a class="footer__link" href="mailto:tccinotec@gmail.com" target="__blank">
                <span class="material-symbols-outlined"> mail </span>
                tccinotec@gmail.com
            </a>
        </div>
    </div>


    <div class="footer_center">
        <div onclick="document.location='home.php'" class="footer__image">

            <img src="logo/foxserv-branco.PNG" alt="FoxServ" class="footer_image">

            <div class="logo-header">
                <h1 class="logo"><a href="home.php"> Fox<span class="foxserv">Serv</span></a></h1>
            </div>
        </div>
        <div class="bottom">Criado por INOTECH </div>
        <div class="copyright_png"><span class="copyright">
                copyright </span>
            2023 Todos os direitos reservados</div>
    </div>
    </div>
    <div class="footer_right">
        <div class="footer__links_right">
            <a class="footer__link" href="mailto:tccinotec@gmail.com" target="__blank">
                <span class="material-symbols-outlined"> help </span>
                Precisa de Ajuda?
            </a>
        </div>
    </div>

</footer>
</html>

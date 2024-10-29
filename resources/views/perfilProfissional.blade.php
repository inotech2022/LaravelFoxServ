@extends('layouts.header')

@section('title', 'Meu Perfil')

@section('content')

    <link href="https://fonts.googleapis.com/css?family=Baloo+Thambi+2&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/FeedUsuario.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contatos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
    <link rel="icon" href="logo/lilas-2.PNG">
    <script src="js/avali-publi.js"></script>
    <script src="js/coracao.js"></script>
    <script src="js/modal.js"></script>

<body>
    

    <main>
        <!-- parte principal -->
        <div class="perfil">

            <!-- informações do profissional -->
            <div class="usuario">

                <div class="foto">
                    <img class="foto-perfil" src="image/upload/{{ $profissional->profilePic }}">
                </div>
                <div class="informacoes">

                    <h1 class="username">{{ $profissional ->name }} {{ $profissional->lastName }}<span class="material-symbols-outlined">
                            check_circle
                        </span></h1>
                    <div class="infos-extras">
                        <p class="localizacao">
                            <span class="material-symbols-outlined">
                                location_on
                            </span>{{ $profissional->city }} , {{ $profissional->uf }}
                        </p>
                        <p class="tip-serv"> | </p>
                        <p class="idade">
                            <span class="material-symbols-outlined">
                                perm_contact_calendar
                            </span> {{ $profissional->age }} anos
                        </p>
                        <p class="tip-serv"> | </p>
                        <p class="idade">
                            <span class="material-symbols-outlined">
                                contract
                            </span>{{ $profissional->totalContracts }} Contrato(s)
                        </p>
                    </div>
                    <div class="serv-tip">
                        <p class="tip-serv">{{ $profissional->serviceTypeName }}</p>
                    </div>

                    <p class="descricao"> {{ $profissional->description }} </p>
                </div>

                <div class="estrelas">
                    <ul class="avaliacao">
                        @for ($j = 1; $j <= 5; $j++)
                            @if ($j <= $mediaRedonda)
                                <li class="star-icon ativo" data-avaliacao="{{ $j }}"><i class="fa fa-star"></i></li>
                            @else
                                <li class="star-icon" data-avaliacao="{{ $j }}"><i class="fa fa-star-o"></i></li>
                            @endif
                        @endfor
                        <label class="media">{{ number_format($media, 1, ',', '.') }}</label>
                    </ul>
                    <div class="botao2">
                        <button class="contratos" onclick="openModal('dv-modal')"> <span
                                class="material-symbols-outlined">
                                contact_page
                            </span> Entre em Contato</button>
                    </div>
                    <div class="botao2">

                        <button class="excluir" onclick="openModal('dv-modal-denunciar')"> <span
                                class="material-symbols-outlined">
                                report
                            </span> Denunciar Perfil</button>
                    </div>
                </div>
            </div>
            <div class="feed">
                <div class="botoes">
                    <button onclick="funcaoAparecerPublicacoes()" class="publi">Publicações </button>
                    <button onclick="funcaoAparecerAvaliacoes()" class="avali">Avaliações </button>
                </div>
                <div class="publicacoes">
                    <div class="naoEncontrada">
                        <h1>O profissional não possui nenhuma publicação</h1>
                        <img src="image/publicacao - modoClaro.png" class="naoEncontrado-modoClaro">
                        <img src="image/publicacao - modoEscuro.png" class="naoEncontrado-modoEscuro">

                    </div>
                    <div class="card_perfil" id="post_">
                        <div class="img-perfil">
                            <img class="img-profile" src="upload/">
                        </div>
                        <div class="legenda">
                            <p class="legenda"></p>
                            <div class="data_like">
                                <p class="data"></p>
                                <span class="material-symbols-outlined favorite-icon" id="favoriteIcon"
                                    onclick="curtir()">
                                    favorite
                                </span>
                                <span id="contador_" style="color: #666; margin-left: 5px;">

                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="avaliacoes">
                    <div class="naoEncontrada">
                        <h1>O profissional não possui nenhuma avaliação</h1>
                        <img src="image/avali-modoClaro.png" class="naoEncontrado-modoClaro">
                        <img src="image/avali-modoEscuro.png" class="naoEncontrado-modoEscuro">

                    </div>
                    <div class="card-av">
                        <div class="av-header">
                            <div class="header-img">
                                <img src="upload/" class="image-header">
                            </div>
                            <div class="header-info">
                                <h4></h4>
                                <p></p>
                            </div>
                            <div class="aspas">
                                <span class="material-symbols-outlined">
                                    format_quote
                                </span>
                            </div>
                        </div>
                        <div class="estrela">
                            <ul class="avaliacao">
                                <label class="media"></label>
                            </ul>
                        </div>
                        <div class="comentario">
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
    <div id="dv-modal" class="modal-cont">
        <div class="alert-modal-cont">
            <div class="modal-header-cont">
                <h1><span class="material-symbols-outlined">
                        perm_phone_msg
                    </span></h1>
            </div>
            <div class="modal-body-cont">
                <h2>Entre em contato com o profissional</h2>

            </div>
            <div class="modal-footer-cont">

                <div class="botoes_modal-cont">
                    <div class="contato">
                        <a href="https://api.whatsapp.com/send?phone=5515"><button
                                class="btn-modal"> <span class="material-symbols-outlined">
                                    message
                                </span> WhatsApp</button></a>
                        <a><button class="btn-modal"><span class="material-symbols-outlined">
                                    phone
                                </span>

                            </button></a>
                        <a><button class="btn-modal" href="mailto:"><span
                                    class="material-symbols-outlined">
                                    email
                                </span> email</button></a>
                    </div>
                    <button class="cancelar-cont" onclick="closeModal('dv-modal')"><span
                            class="material-symbols-outlined">
                            cancel
                        </span></button>
                </div>

            </div>
        </div>
    </div>
    <div id="dv-modal-denunciar" class="modal">

        <div class="alert-modal">
            <div class="modal-header">

                <h2>Por qual motivo deseja denunciar o profissional?</h2>
            </div>
            <div class="modal-body">



                <form id="form-denuncia" class="form-denuncia" method="POST" action="processarDenuncia.php">
                    <div class="radios">
                        <input type="radio" name="motivo" value="spam" />Spam<br>
                        <input type="radio" name="motivo" value="conteúdo inapropriado" />Conteúdo Inapropriado<br>
                        <input type="radio" name="motivo" value="comportamento inadequado" />Comportamento
                        Inadequado<br>
                        <input type="radio" name="motivo" value="outro" />Outro:<br>
                        <input type="hidden" name="idProfissional" value="">
                        <input type="hidden" name="idUsuario" value="" />
                    </div>
                    <textarea name="outroMotivo" rows="4" cols="50"></textarea>
                    <div class="modal-footer">
                        <div class="botoes_modal">
                            <button type="submit" name="submit" class="btn-modal">Enviar Denúncia</button>
                            <button type="button" class="cancelar fechar-modal"
                                onclick="closeModal('dv-modal-denunciar')">Cancelar</button>
                        </div>
                    </div>

                </form>


            </div>
        </div>
    </div>

</body>


@endsection
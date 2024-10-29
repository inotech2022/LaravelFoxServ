@extends('layouts.header')

@section('title', 'Meu Perfil')

@section('content')

    <link href="https://fonts.googleapis.com/css?family=Baloo+Thambi+2&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/FeedProf.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
    <link rel="icon" href="logo/lilas-2.PNG">
    <script src="js/avali-publi.js"></script>
    <script src="js/coracao.js"></script>
    <script src="js/modal.js"></script>

<main>
    <!-- parte principal -->
    <div class="perfil">
        <!-- informações do profissional -->
        <div class="usuario">
            <div class="foto">
                <img class="foto-perfil" src="image/upload/{{ $profissional->profilePic }}" alt="Foto do perfil">
            </div>
            <div class="informacoes">
                <h1 class="username">{{ $profissional ->name }} {{ $profissional->lastName }}<span class="material-symbols-outlined">check_circle</span></h1>
                <div class="infos-extras">
                    <p class="localizacao">
                        <span class="material-symbols-outlined">location_on</span>
                        {{ $profissional->city }} , {{ $profissional->uf }}
                    </p>
                    <p class="tip-serv"> | </p>
                    <p class="idade">
                        <span class="material-symbols-outlined">perm_contact_calendar</span>{{ $profissional->age }} anos
                    </p>
                    <p class="tip-serv"> | </p>
                    <p class="idade">
                        <span class="material-symbols-outlined">contract</span>{{ $profissional->totalContracts }} Contrato(s)
                    </p>
                </div>
                <div class="serv-tip">
                    <p class="descricao">{{ $profissional->description }}</p>
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
                    <div class="botao">
                        <button class="editar" onclick="document.location='{{ route('desempenhoProfissional') }}'"><span class="material-symbols-outlined">equalizer</span>Desempenho</button>
                        <button class="contratos" onclick="document.location='contratos.php'"><span class="material-symbols-outlined">feed</span>Meus Contratos</button>
                    </div>
                    <div class="botao">
                        <button class="editar" onclick="document.location='editarDados.php'"><span class="material-symbols-outlined">edit</span>Editar Perfil</button>
                        <button class="contratos" onclick="document.location='redSenha.php'"><span class="material-symbols-outlined">lock_reset</span>Alterar Senha</button>
                    </div>
                    <div class="botao2">
                        <button onclick="openModal('dv-modal')" class="excluir">Excluir Conta</button>
                    </div>
                </div>
            </div>

            <div class="feed">
                <div class="botoes">
                    <button onclick="funcaoAparecerPublicacoes()" class="publi">Publicações </button>
                    <button onclick="funcaoAparecerAvaliacoes()" class="avali">Avaliações </button>
                </div>

                <div class="publicacoes">
                    <!-- publicações do profissional -->
                    <!-- cada 'card-perfil' é um post -->
                    <div class="naoEncontrada">
                        <h1>Faça a sua primeira publicação</h1>
                        <img src="{{ asset('image/publicacao - modoClaro.png') }}" class="naoEncontrado-modoClaro">
                        <img src="{{ asset('image/publicacao - modoEscuro.png') }}" class="naoEncontrado-modoEscuro">
                    </div>
                    <div class="card_perfil">
                        <div class="img_perfil">
                            <img class="foto_publi" src="{{ asset('upload/') }}">
                        </div>
                        <div class="texto_publi">
                            <div class="texto_publi2">
                                <h1 class="titulo">Título do Post</h1>
                                <h1 class="descricao">Descrição do post</h1>
                            </div>
                        </div>
                        <div class="card_rodape">
                            <div class="like">
                                <button class="btn_like"><span class="material-symbols-outlined">favorite</span></button>
                                <button class="btn_comentar"><span class="material-symbols-outlined">comment</span></button>
                                <button class="btn_compartilhar"><span class="material-symbols-outlined">share</span></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="avaliacoes">
                    <div class="naoEncontrada">
                        <h1>Não há avaliações</h1>
                        <img src="{{ asset('image/avaliacao - modoClaro.png') }}" class="naoEncontrado-modoClaro">
                        <img src="{{ asset('image/avaliacao - modoEscuro.png') }}" class="naoEncontrado-modoEscuro">
                    </div>
                    <div class="card_aval">
                        <div class="img_perfil">
                            <img class="foto_publi" src="{{ asset('upload/') }}">
                        </div>
                        <div class="texto_aval">
                            <div class="texto_aval2">
                                <h1 class="titulo">Título da Avaliação</h1>
                                <h1 class="descricao">Descrição da avaliação</h1>
                            </div>
                        </div>
                        <div class="card_rodape">
                            <div class="like">
                                <button class="btn_like"><span class="material-symbols-outlined">favorite</span></button>
                                <button class="btn_comentar"><span class="material-symbols-outlined">comment</span></button>
                                <button class="btn_compartilhar"><span class="material-symbols-outlined">share</span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="dv-modal" class="modal">
            <div class="alert-modal">
                <div class="modal-header">
                    <h1><span class="material-symbols-outlined">
                            warning
                        </span></h1>
                </div>
                <div class="modal-body">
                    <h2>Tem certeza que deseja excluir sua conta?</h2>

                </div>
                <div class="modal-footer">
                    <button onclick="excluirConta()" class="btn-modal">Sim </button>
                    <button class="btn-modal" onclick="closeModal('dv-modal')">Cancelar</button>
                </div>
            </div>
        </div>
        </div>
</main>
@endsection

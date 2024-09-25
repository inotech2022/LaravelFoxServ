@extends('includes.header')

@section('title', 'Meu Perfil')

@section('content')
<main>
    <!-- parte principal -->
    <div class="perfil">
        <!-- informações do profissional -->
        <div class="usuario">
            <div class="foto">
                <img class="foto-perfil" src="{{ asset('upload/') }}" alt="Foto do perfil">
            </div>
            <div class="informacoes">
                <h1 class="username"><span class="material-symbols-outlined">check_circle</span></h1>
                <div class="infos-extras">
                    <p class="localizacao">
                        <span class="material-symbols-outlined">location_on</span>
                    </p>
                    <p class="tip-serv"> | </p>
                    <p class="idade">
                        <span class="material-symbols-outlined">perm_contact_calendar</span>anos
                    </p>
                    <p class="tip-serv"> | </p>
                    <p class="idade">
                        <span class="material-symbols-outlined">contract</span>Contrato(s)
                    </p>
                </div>
                <div class="serv-tip">
                    <p class="descricao"></p>
                </div>
                <div class="estrelas">
                    <ul class="avaliacao">
                        <label class="media"></label>
                    </ul>
                    <div class="botao">
                        <button class="editar" onclick="document.location='desempenho.php'"><span class="material-symbols-outlined">equalizer</span>Desempenho</button>
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
</main>
@endsection

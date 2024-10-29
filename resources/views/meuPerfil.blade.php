@extends('layouts.header')

@section('title', 'Meu Perfil')
@section('css')
<link href="https://fonts.googleapis.com/css?family=Baloo+Thambi+2&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/FeedProf.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
    <link rel="icon" href="logo/lilas-2.PNG">
    <script src="js/avali-publi.js"></script>
    <script src="js/modal.js"></script>
    @endsection

@section('content')

 <!-- parte principal -->
 <div class="perfil">
        <!-- informações do profissional -->
        <div class="usuario">
            
            <div class="foto">
                <img class="foto-perfil" src="upload/" alt="Foto do perfil">
            </div>
            <div class="informacoes">
                <h1 class="username"><span class="material-symbols-outlined">check_circle</span></h1>
                <div class="infos-extras">
                    <p class="localizacao">
                        <span class="material-symbols-outlined">location_on</span>
                    </p>
                    <p class="tip-serv"> | </p>
                    <p class="idade">
                        <span class="material-symbols-outlined">perm_contact_calendar</span> anos
                    </p>
                    <p class="tip-serv"> | </p>
                    <p class="idade">
                        <span class="material-symbols-outlined">contract</span> Contrato(s)
                    </p>
                </div>
                <div class="serv-tip">
   
</div>

                <p class="descricao"></p>
            </div>
            <div class="estrelas">
                <ul class="avaliacao">
                <li class="star-icon ativo" data-avaliacao="{{ $j }}"><i class="fa fa-star"></i></li>
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
                    
                 <div class="naoEncontrada">
    <h1>Faça a sua primeira publicação</h1>
    <img src="image/publicacao - modoClaro.png" class="naoEncontrado-modoClaro">
                <img src="image/publicacao - modoEscuro.png" class="naoEncontrado-modoEscuro">
    
</div>
                    <div class="card_perfil">
                         <div class="img-perfil">
                            <img class="img-profile" src="upload/">
                        </div>
                        <div class="legenda">
                            <p class="legenda">Legenda</p>
                            <div class="data_like">
                                <p class="data">13/09/2024</p>
                                <img class="lixo" src="image/trash_icon_213986.svg">
                            </div>
                        </div>
                    </div>
       
                    
                </div>

                <div class="avaliacoes">
                    <!-- avaliações dos clientes -->
                    <!-- cada 'card-av' é um comentário -->
                    <!-- essa parte NAO está visivel (display:none) -->
                    <div class="naoEncontrada">
    <h1>Você ainda não possui nenhuma avaliação</h1>
    <img src="image/avali-modoClaro.png" class="naoEncontrado-modoClaro">
                <img src="image/avali-modoEscuro.png" class="naoEncontrado-modoEscuro">
    
</div>
        <div class="card-av">
            <div class="av-header">
                        <div class="header-img">
                            <img src="upload/" class="image-header">
                        </div>
                        <div class="header-info">
                            <h4>nome usuario</h4>
                            <p>13/09/2024</p>
                        </div>
                        <div class="aspas">
                            <span class="material-symbols-outlined">
                                    format_quote
                            </span>
                        </div>
            </div>
                        <div class="estrela">
                            <ul class="avaliacao">
    <li class="star-icon ativo" data-avaliacao="'.$j.'"><i class="fa fa-star"></i></li>

    <label class="media">5</label>
</ul>
                        </div>
                        <div class="comentario">
                            <p>lalalalala</p>
                        </div>
                                            
        </div>                     
        </div>

                </div>
                <!-- rodapé -->

            </div>
            <div onclick="document.location='novoPost.php'" class="btn-flutuante">
                <span class="material-symbols-outlined">
                    add
                </span>
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
@endsection

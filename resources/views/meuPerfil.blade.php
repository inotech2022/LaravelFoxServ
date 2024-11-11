@extends('layouts.header')

@section('title', 'Meu Perfil')
@section('css')
<link href="https://fonts.googleapis.com/css?family=Baloo+Thambi+2&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ asset('css/FeedProf.css') }}">
<link rel="stylesheet" href="{{ asset('css/modal.css') }}">
<link rel="icon" href="logo/lilas-2.PNG">
<script src="js/avali-publi.js" defer></script>
<script src="js/modal.js"></script>
@endsection

@section('content')
<main>
    <!-- parte principal -->
    <div class="perfil">
        <!-- informações do profissional -->
        <div class="usuario">

            <div class="foto">
                <img class="foto-perfil" src="/{{ $profissional->profilePic }}" alt="Foto do perfil">
            </div>
            <div class="informacoes">
                <h1 class="username">{{ $profissional ->name }} {{ $profissional->lastName }}<span
                        class="material-symbols-outlined">check_circle</span></h1>
                <div class="infos-extras">
                    <p class="localizacao">
                        <span class="material-symbols-outlined">location_on</span> {{ $profissional->city }} , {{
                        $profissional->uf }}
                    </p>
                    <p class="tip-serv">  |   </p>
                    <p class="idade">
                        <span class="material-symbols-outlined">perm_contact_calendar</span> {{ $profissional->age }}
                        anos
                    </p>
                    <p class="tip-serv"> | </p>
                    <p class="idade">
                        <span class="material-symbols-outlined"> contract</span>{{ $profissional->totalContracts }}
                        Contrato(s)
                    </p>
                </div>
                @foreach ($servicos as $servicos)
                    <div class="serv-tip">
                        <p class="tip-serv">  {{ $servicos->serviceName }}  </p>
                    </div>
                @endforeach

                <p class="descricao">{{ $profissional->description }}</p>
            </div>
            <div class="estrelas">
                <ul class="avaliacao">
                    @for ($j = 1; $j <= 5; $j++) 
                    @if ($j <=$mediaRedonda) <li class="star-icon ativo"
                        data-avaliacao="{{ $j }}"><i class="fa fa-star"></i></li>
                        @else
                        <li class="star-icon" data-avaliacao="{{ $j }}"><i class="fa fa-star-o"></i></li>
                        @endif
                    @endfor
                    <label class="media">{{ number_format($media, 1, ',', '.') }}</label>
                </ul>
                <div class="botao">
                    <button class="editar" onclick="document.location='{{route('desempenhoProfissional')}}'"><span
                            class="material-symbols-outlined">equalizer</span>Desempenho</button>
                    <button class="contratos" onclick="document.location='{{ route('contratoProfissional') }}'"><span
                            class="material-symbols-outlined">feed</span>Meus Contratos</button>
                </div>
                <div class="botao">
                    <button class="editar" onclick="document.location='{{ route('editarDadosProfissional') }}'"><span
                            class="material-symbols-outlined">edit</span>Editar Perfil</button>
                    <button class="contratos" onclick="document.location='{{ route('redefinirSenha') }}'"><span
                            class="material-symbols-outlined">lock_reset</span>Alterar Senha</button>
                </div>
                <div class="botao2">
                    <button onclick="openModal('dv-modal')" class="excluir">Excluir Conta</button>
                </div>
            </div>

        </div>

        <div class="feed">
            <div class="botoes">
                <button onclick="funcaoAparecerPublicacoes()" class="publi" id="publi">Publicações </button>
                <button onclick="funcaoAparecerAvaliacoes()" class="avali" id="avali">Avaliações </button>
            </div>

            <div class="publicacoes" id="publicacoes">
                @if($publicacoes->isEmpty())
                <div class="naoEncontrada">
                    <h1>Faça a sua primeira publicação</h1>
                    <img src="image/publicacao - modoClaro.png" class="naoEncontrado-modoClaro">
                    <img src="image/publicacao - modoEscuro.png" class="naoEncontrado-modoEscuro">
                </div>
                @else
                @foreach($publicacoes as $publicacao)
                <div class="card_perfil">
                    <div class="img-perfil">
                        <img class="img-profile" src="/{{ $publicacao->image }}" >
                    </div>
                    <div class="legenda">
                        <p class="legenda">{{ $publicacao->caption }}</p>
                        <div class="data_like">
                            <p class="data">{{ \Carbon\Carbon::parse($publicacao->date)->format('d/m/Y') }}</p>
                            <!-- Botão de excluir com acionamento de modal -->
                            <button class="material-symbols-outlined lixo" onclick="openModalDelete({{ $publicacao->publicationId }})" style="border: none; background: none;">
                                delete
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>

            <div class="avaliacoes" id="avaliacoes">
                @if($avaliacoes->isEmpty())
                <div class="naoEncontrada">
                    <h1>Você ainda não possui nenhuma avaliação</h1>
                    <img src="image/avali-modoClaro.png" class="naoEncontrado-modoClaro">
                    <img src="image/avali-modoEscuro.png" class="naoEncontrado-modoEscuro">
                </div>
                @else
                @foreach($avaliacoes as $avaliacao)
                <div class="card-av">
                    <div class="av-header">
                        <div class="header-img">
                            <img  class="image-header" src="/{{ $avaliacao->profilePic }}">
                        </div>
                        <div class="header-info">
                            <h4>{{ $avaliacao->name }} {{ $avaliacao->lastName }} </h4>
                            <p>{{ \Carbon\Carbon::parse($avaliacao->ratingDate)->format('d/m/Y') }}</p>
                        </div>
                        <div class="aspas">
                            <span class="material-symbols-outlined">
                                format_quote
                            </span>
                        </div>
                    </div>
                    <div class="estrela">
                        <ul class="avaliacao">
                            @for ($j = 1; $j <= 5; $j++) 
                            @if ($j <=$avaliacao->starAmount)
                                <li class="star-icon ativo" data-avaliacao="{{ $j }}"><i class="fa fa-star"></i></li>
                            @else
                                <li class="star-icon" data-avaliacao="{{ $j }}"><i class="fa fa-star-o"></i></li>
                            @endif
                            @endfor
                        </ul>
                    </div>
                    <div class="comentario">
                        <p>{{ $avaliacao->comment }}</p>
                    </div>

                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>

    <div onclick="document.location='{{route('novaPublicacao')}}'" class="btn-flutuante">
        <span class="material-symbols-outlined">
            add
        </span>
    </div>

</main>

<!-- Modal para confirmar a exclusão da publicação -->
<div id="dv-modal-post" class="modal">
    <div class="alert-modal">
        <div class="modal-header">
            <h1><span class="material-symbols-outlined">warning</span></h1>
        </div>
        <div class="modal-body">
            <h2>Tem certeza que deseja excluir esta publicação?</h2>
        </div>
        <div class="modal-footer">
            <!-- Formulário de exclusão com o publicationId -->
            <form id="delete-form" action="" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-modal">Sim</button>
            </form>
            <button class="btn-modal" onclick="closeModal('dv-modal-post')">Cancelar</button>
        </div>
    </div>
</div>

<script>
    // Função para abrir o modal de exclusão com o publicationId
    function openModalDelete(publicationId) {
        // Define a ação do formulário para a rota de exclusão
        document.getElementById('delete-form').action = '/publicacao/' + publicationId;
        openModal('dv-modal-post');
    }
</script>

@endsection

@extends('layouts.header')

@section('title', 'Profissionais')

<script src="/js/modo_escuro.js" defer></script>
<link rel="stylesheet" href="/css/profissionais.css">

@section('content')
<div class="principal">
    <div class="topo">
        <div class="titulo">
            <h1>NOSSOS PROFISSIONAIS</h1>
            <p>Nossos profissionais disponíveis nessa categoria</p>
        </div>
        <form method="GET">
            <div class="cidade">
                <p>Cidade</p>
                <select name="cidade" onchange="this.form.submit()">
                    <option value="" selected disabled>Escolha a cidade</option>
                    <!-- Preenche as opções de cidade -->
                    @foreach($cidades as $cidade)
                        <option value="{{ $cidade->city }}" {{ request('cidade') == $cidade->city ? 'selected' : '' }}>
                            {{ $cidade->city }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="estrela">
                <p>Avaliação</p>
                <select name="media" onchange="this.form.submit()">
                    <option value="" selected disabled>Avaliações</option>
                    <option value="1" {{ request('media') == '1' ? 'selected' : '' }}>1 estrela</option>
                    <option value="2" {{ request('media') == '2' ? 'selected' : '' }}>2 estrelas</option>
                    <option value="3" {{ request('media') == '3' ? 'selected' : '' }}>3 estrelas</option>
                    <option value="4" {{ request('media') == '4' ? 'selected' : '' }}>4 estrelas</option>
                    <option value="5" {{ request('media') == '5' ? 'selected' : '' }}>5 estrelas</option>
                </select>
            </div>

            <input type="hidden" name="idServico" value="{{ $serviceId }}">
        </form>
    </div>

    <div class="profissionais">
        @if($professionals->isEmpty())
            <div class="naoEncontrada">
                <h1>Não existem profissionais disponíveis nessa categoria</h1>
                <img src="{{ asset('image/publicacao - modoClaro.png') }}" class="naoEncontrado-modoClaro">
                <img src="{{ asset('image/publicacao - modoEscuro.png') }}" class="naoEncontrado-modoEscuro">
            </div>
        @else
            @foreach($professionals as $professional)
                <div class="card_perfil">
                    <div class="img-perfil">
                        <img class="img-profile" alt="Imagem do profissional" src="/{{ $professional->profilePic }}" >
                    </div>
                    <div class="informacoes">
                        <h2 class="username">{{ $professional->name }}</h2>
                        <p class="localizacao">{{ $professional->city }}, {{ $professional->uf }}
                            <span class="iconeee">location_on</span>
                        </p>
                        <div class="row">
                            <div class="descricao">
                                <p class="profile-desc">{{ $professional->description }}</p>
                            </div>
                            <ul class="avaliacao">
                                @foreach ($professionals as $professional)
                                    @for ($j = 1; $j <= 5; $j++)
                                        @if ($j <= $professional->averageRounded)
                                            <li class="star-icon ativo" data-avaliacao="{{ $j }}">
                                                <i class="fa fa-star"></i>
                                            </li>
                                        @else
                                            <li class="star-icon" data-avaliacao="{{ $j }}">
                                                <i class="fa fa-star-o"></i>
                                            </li>
                                        @endif
                                    @endfor
                                    <label class="media">{{ number_format($professional->average, 1, ',', '.') }}</label>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <button onclick="document.location='/perfilProfissional/{{ $professional->professionalId }}'" class="btn-perfil">Ver perfil</button>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection
@section('footer')
@include('layouts.footer')
@endsection
@extends('layouts.main')

@section('title', 'Profissionais')

<script src="js/modo_escuro.js" defer></script>
<link rel="stylesheet" href="/css/profissionais.css">
@section('content')
    

    

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
            @foreach($professionals as $professional)
                <div class="card_perfil">
                    <div class="img-perfil">
                        <img class="img-profile" src="{{ asset('upload/' . $professional->profile_image) }}" alt="Imagem do profissional">
                    </div>
                    <div class="informacoes">
                        <h2 class="username">{{ $professional->name }} {{ $professional->serviceId }}</h2>
                        <p class="localizacao">{{ $professional->city }}, {{ $professional->state }}
                            <span class="iconeee">
                                location_on
                            </span>
                        </p>
                        <div class="row">
                            <div class="descricao">
                                <p class="profile-desc">{{ $professional->description }}</p>
                            </div>
                            <ul class="avaliacao">
                                @for ($j = 1; $j <= 5; $j++)
                                    <li class="star-icon {{ $j <= $professional->average_rating ? 'ativo' : '' }}" data-avaliacao="{{ $j }}">
                                        <i class="fa {{ $j <= $professional->average_rating ? 'fa-star' : 'fa-star-o' }}"></i>
                                    </li>
                                @endfor
                                <label class="media">{{ number_format($professional->average_rating, 1) }}</label>
                            </ul>
                        </div>
                    </div>
                    <button onclick="document.location='/perfilProfissional/{{ $professional->professionalId }}'" class="btn-perfil">Ver perfil</button>
                </div>
            @endforeach
        </div>
    </div>
@endsection
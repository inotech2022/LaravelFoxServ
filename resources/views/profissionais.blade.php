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
                <div  class="card_perfil ">
                    <div class="img-perfil">
                        <img class="img-profile" src="upload/">
                    </div>
                    <div class="informacoes">
                        <h2 class="username">Katia Regina</h2>
                        <p class="localizacao">Sorocaba, SP
                            <span class="iconeee">
                                location_on
                            </span>
                        </p>
                       <div class="row">
    <div class="descricao">
        <p class="profile-desc">abc abc abc abc</p>
    </div>
    
    <ul class="avaliacao">
    @for ($j = 1; $j <= 5; $j++)
                            @if ($j <= 1)
                                <li class="star-icon ativo" data-avaliacao="{{ $j }}"><i class="fa fa-star"></i></li>
                            @else
                                <li class="star-icon" data-avaliacao="{{ $j }}"><i class="fa fa-star-o"></i></li>
                            @endif
                        @endfor
        <label class="media">4.5</label>
    </ul>
</div>
                    </div>
                    <button onclick="document.location=" class="btn-perfil">Ver perfil</button>

                </div>
            </div>
        </div>
 @endsection

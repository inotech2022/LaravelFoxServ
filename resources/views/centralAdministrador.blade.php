@extends('layouts.header')


@section('title', 'Central do Administrador')
@section('css')
<link href="https://fonts.googleapis.com/css?family=Baloo+Thambi+2&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
<link rel="icon" href="logo/lilas-2.PNG">

@endsection

@section('content')

<script src="js/adm.js"></script>

<div class="controle">

        <div class="botoes">
                <button onclick="funcaoAparecerAvaliacoes()" class="avali" id="avali">Avaliações da Plataforma</button>
                <button onclick="funcaoAparecerSugestoes()" class="sugest" id="sugest">Sugestões</button>
                <button onclick="funcaoAparecerDenuncias()" class="denun" id="denun">Denúncias</button>
        </div>



        <div class="avaliacoes" id="avaliacoes">
            <div class="avali-left">
                <h1>Avaliações da Plataforma</h1>
                <form method="GET">
                    <select name="filtro_avaliacoes" onchange="this.form.submit()">
                        <option value="" selected disabled> Ordenar por </option>
                        <option value="name"> Código </option>
                        <option value="date"> Data </option>
                    </select>
                </form>
                    <div class="titulos">
                        <label class="txt_codigo">Código</label>
                        <label class="txt_data">Data</label>
                        <label class="txt_usuario">Usuário</label>
                        <label class="txt_avaliacao">Avaliação</label>
                    </div>
                    @foreach ($ratings as $rating)
                    <div class="campos">
                        <input class="codigo" type="text" value="{{ $rating->websiteRatingId }}" disabled>
                        <input class="data" type="text" value="{{ \Carbon\Carbon::parse($rating->ratingDate)->format('d/m/Y') }}" disabled>
                        <input class="usuario" type="text" value="{{ $rating->user->name }} {{ $rating->user->lastName }}" disabled>
                        <input class="avaliacao" type="text" value="{{ $rating->comment }}" disabled>
                        <div class="estrela">
                        <ul class="avaliacao-estrela">
                            @for ($j = 1; $j <= 5; $j++) 
                            @if ($j <=$rating->starAmount)
                                <li class="star-icon ativo" data-avaliacao="{{ $j }}"><i class="fa fa-star"></i></li>
                            @else
                                <li class="star-icon" data-avaliacao="{{ $j }}"><i class="fa fa-star-o"></i></li>
                            @endif
                            @endfor
                        </ul>
                    </div>
    
                        <button onclick="window.location.href='mailto:{{ $rating->user->email }}'"  class="contato">Contatar</button>
                    </div>
                    @endforeach
                
            </div>

            <div class="avali-right">
                <div class="image">
                    <img src="https://foxservbucket.s3.us-east-1.amazonaws.com/contratos-modoClaro.png" class="img-right-modoClaro">
                    <img src="https://foxservbucket.s3.us-east-1.amazonaws.com/contratos-modoEscuro.png" class="img-right-modoEscuro">
                </div>
            </div>
        </div>


        <div class="sugestoes" id="sugestoes">
            <div class="avali-left">
            <h1>Sugestões</h1>
            <form method="GET">
                <select name="filtro_sugestoes" onchange="this.form.submit()">
                    <option value="" selected disabled> Ordenar por </option>
                    <option value="name"> Código </option>
                    <option value="date"> Data </option>
                </select>
            </form>
                    <div class="titulos">
                        <label class="txt_codigo">Código</label>
                        <label class="txt_data">Data</label>
                        <label class="txt_usuario">Usuário</label>
                        <label class="txt_sugestao">Sugestão</label>
                    </div>
                    @foreach ($suggestions as $suggestion)
                        <div class="campos">
                            <input class="codigo" type="text" value="{{ $suggestion->suggestionId }}" disabled>
                            <input class="data" type="text" value="{{ \Carbon\Carbon::parse($suggestion->suggestionDate)->format('d/m/Y') }}" disabled>
                            <input class="usuario" type="text" value="{{ $suggestion->user->name }} {{ $suggestion->user->lastName }}" disabled>
                            <input class="sugestao" type="text" value="{{ $suggestion->suggestion }}" disabled>
                        </div>
                    @endforeach
            </div>

            <div class="avali-right">
                <div class="image">
                    <img src="https://foxservbucket.s3.us-east-1.amazonaws.com/contratos-modoClaro.png" class="img-right-modoClaro">
                    <img src="https://foxservbucket.s3.us-east-1.amazonaws.com/contratos-modoEscuro.png" class="img-right-modoEscuro">
                </div>                                  
            </div>
        </div>



        <div class="denuncias" id="denuncias">
            <div class="avali-left">
            <h1>Denúncias</h1>
            <form method="GET">
                <select name="filtro_denuncias" onchange="this.form.submit()">
                    <option value="" selected disabled> Ordenar por </option>
                    <option value="name"> Código </option>
                    <option value="date"> Data </option>
                </select>
            </form>
                    <div class="titulos">
                        <label class="txt_codigo">Código</label>
                        <label class="txt_data">Data</label>
                        <label class="txt_usuario">Usuário</label>
                        <label class="txt_profissional">Profissional</label>
                        <label class="txt_denuncia">Denúncia</label>
                    </div>
                    @foreach ($complaints as $complaint)
                        <div class="campos">
                            <input class="codigo" type="text" value="{{ $complaint->complaintId }}" disabled>
                            <input class="data" type="text" value="{{ \Carbon\Carbon::parse($complaint->complaintDate)->format('d/m/Y') }}" disabled>
                            <input class="usuario" type="text" value="{{ $complaint->user->name }} {{ $complaint->user->lastName }}" disabled>
                            <input class="profissional" type="text" value="{{ $complaint->professional->user->name }} {{ $complaint->professional->user->lastName }}" disabled>
                            <input class="denuncia" type="text" value="{{ $complaint->reason }}" disabled>
                            <button onclick="document.location='/denunciaAdm/{{ $complaint->professionalId }}'" class="contato">Avaliar Situação</button>
                        </div>
                    @endforeach
            </div>

            <div class="avali-right">
                <div class="image">
                    <img src="https://foxservbucket.s3.us-east-1.amazonaws.com/contratos-modoClaro.png" class="img-right-modoClaro">
                    <img src="https://foxservbucket.s3.us-east-1.amazonaws.com/contratos-modoEscuro.png" class="img-right-modoEscuro">
                </div>     
            </div>
        </div>
</div>
@endsection
@section('footer')
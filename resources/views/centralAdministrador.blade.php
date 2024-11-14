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
                    <div class="titulos">
                        <label class="txt_codigo">Código</label>
                        <label class="txt_usuario">Usuário</label>
                        <label class="txt_avaliacao">Avaliação</label>
                    </div>
                    <div class="campos">
                    <input class="codigo" type="text" id="codigo" name="codigo"  value="" disabled>
                    <input class="usuario" type="text" id="usuario" name="usuario"  value="" disabled>
                    <input class="avaliacao" type="text" id="avaliacao" name="avaliacao"  value="" disabled>
                    <button class="contato">Contatar</button>
                    </div>
                
            </div>

            <div class="avali-right">
                <div class="image">
                    <img src="image/contratos-modoClaro.png" class="img-right-modoClaro">
                    <img src="image/contratos-modoEscuro.png" class="img-right-modoEscuro">
                </div>
            </div>
        </div>


        <div class="sugestoes" id="sugestoes">
            <div class="avali-left">
            <h1>Sugestões</h1>
                    <div class="titulos">
                        <label class="txt_codigo">Código</label>
                        <label class="txt_usuario">Usuário</label>
                        <label class="txt_sugestao">Sugestão</label>
                    </div>
                    <div class="campos">
                    <input class="codigo" type="text" id="codigo" name="codigo"  value="" disabled>
                    <input class="usuario" type="text" id="usuario" name="usuario"  value="" disabled>
                    <input class="sugestao" type="text" id="sugestao" name="sugestao"  value="" disabled>
                    
                    </div>
            </div>

            <div class="avali-right">
                <div class="image">
                    <img src="image/contratos-modoClaro.png" class="img-right-modoClaro">
                    <img src="image/contratos-modoEscuro.png" class="img-right-modoEscuro">
                </div>                                  
            </div>
        </div>



        <div class="denuncias" id="denuncias">
            <div class="avali-left">
            <h1>Denúncias</h1>
                    <div class="titulos">
                        <label class="txt_codigo">Código</label>
                        <label class="txt_usuario">Usuário</label>
                        <label class="txt_usuario">Profissional</label>
                        <label class="txt_sugestao">Denúncia</label>
                    </div>
                    <div class="campos">
                    <input class="codigo" type="text" id="codigo" name="codigo"  value="" disabled>
                    <input class="usuario" type="text" id="usuario" name="usuario"  value="" disabled>
                    <input class="profissional" type="text" id="profissional" name="profissional"  value="" disabled>
                    <input class="denuncia" type="text" id="denuncia" name="denuncia"  value="" disabled>
                    <button onclick="window.location='{{ route('denunciaAdm') }}'" class="contato">Avaliar Situação</button>
                    </div>
            </div>

            <div class="avali-right">
                <div class="image">
                    <img src="image/contratos-modoClaro.png" class="img-right-modoClaro">
                    <img src="image/contratos-modoEscuro.png" class="img-right-modoEscuro">
                </div>     
            </div>
        </div>
</div>
@endsection
@section('footer')
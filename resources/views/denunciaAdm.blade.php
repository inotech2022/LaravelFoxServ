@extends('layouts.header')


@section('title', 'Central do Administrador')
@section('css')
<link href="https://fonts.googleapis.com/css?family=Baloo+Thambi+2&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ asset('css/denunciaAdm.css') }}">
<link rel="icon" href="logo/lilas-2.PNG">

@endsection

@section('content')

<div class="denuncias">
    <h1 class="tit-denuncia">Denúncias</h1>
    <div class="conteudo">
        <div class="left">
            <div class="card-prof">
                <div class="header-prof">
                    <img src="/image/upload/fer lopes.jpg" alt="">
                    <h1>Nome Profissional</h1>
                </div>
                <div class="info-prof">
                    <div class="pessoais">
                        <p>Idade:</p>
                        <p>Telefone:</p>
                        <p>Email:</p>
                    </div>
                    <div class="prof">
                        <p>Tipo de Serviço</p>
                        <p>Serviço</p>
                    </div>
                </div>
            </div>
            <div class="card-aval">
            <div class="header-aval">
                    <img src="/image/upload/fer lopes.jpg" alt="">
                    <div class="info-aval">
                    <h1>Nome Cliente</h1>
                    <div class="info-2">
                    <p>14/11/2024</p>
                    <div class="estrela">
                                <ul class="estrela-av">
                                    <li class="star-icon" data-avaliacao="1"></li>
                                    <li class="star-icon" data-avaliacao="2"></li>
                                    <li class="star-icon" data-avaliacao="3"></li>
                                    <li class="star-icon" data-avaliacao="4"></li>
                                    <li class="star-icon ativo" data-avaliacao="5"></li>
                                </ul>
                    </div>
                    </div>
                    
                    </div>
                    
            </div>
            <div class="aval">
                <p>Comentário</p>
            </div>
            </div>
        </div>
        <div class="right">
            <h2>Denúncias Recebidas</h2>
                        <div class="titulos">
                            <label class="txt_codigo">Código</label>
                            <label class="txt_usuario">Usuário</label>
                            <label class="txt_sugestao">Denúncia</label>
                        </div>
                        <div class="campos">
                        <input class="codigo" type="text" id="codigo" name="codigo"  value="" disabled>
                        <input class="usuario" type="text" id="usuario" name="usuario"  value="" disabled>
                        <input class="denuncia" type="text" id="denuncia" name="denuncia"  value="" disabled>
                        </div>

                        <div class="btnDenuncia">
                        <button href="mailto:" class="contato">Comunicar Profissional</button>
                        <button class="banir">Banir Profissional</button>
                        </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
@endsection
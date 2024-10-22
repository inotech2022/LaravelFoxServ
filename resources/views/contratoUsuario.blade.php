@extends('layouts.main')

@section('title', 'Meus Contratos')
@section('nome')
não sei
@endsection
<link rel="stylesheet" href="{{ asset('css/contratoUsuario.css') }}">
@section('content')


        <div class="principal">
            <div class="topo">
                <div class="titulo">
                    <h1>Serviços Contratados </h1>
                    <p>Não esqueça de avaliar os serviços contratados</p>
                    <form method="GET">
                    <select name="filtro" onchange="this.form.submit()">
                        <option value="" selected disabled> Ordenar por </option>
                        <option value="nomeProf"> Profissional </option>
                        <option value="dataInicial"> Data </option>
                    </select>
                        <input type="hidden" name="email" value="">
                    </form>
                </div>
                <div class="image">
                    <img src="image/contratos-modoClaro.png" class="img-right-modoClaro">
                    <img src="image/contratos-modoEscuro.png" class="img-right-modoEscuro">
                </div>
            </div>


            <div class="profissionais">

<div class="naoEncontrada">
                <h1>Você ainda não possui nenhum contrato</h1>
                <img src="image/vazio-modoClaro.png" class="naoEncontrado-modoClaro">
                <img src="image/vazio-modoEscuro.png" class="naoEncontrado-modoEscuro">
            </div>
       <div class="contrato">
                        <div class="card_contrato">
                            <div class="info">
                                <div class="icon">
                                    <span class="material-symbols-outlined">contract</span>
                                </div>
                                <div class="texto">
                                    <div class="info-titulo">Status do Contrato</div>
                                    <div class="info-texto"></div>
                                </div>
                            </div>
                            <div class="info">
                                <div class="icon">
                                    <span class="material-symbols-outlined">person</span>
                                </div>
                                <div class="texto">
                                    <div class="info-titulo">Nome do Profissional</div>
                                    <div class="info-texto"></div>
                                </div>
                            </div>
                            <div class="info">
                                <div class="icon">
                                    <span class="material-symbols-outlined">check_circle</span>
                                </div>
                                <div class="texto">
                                    <div class="info-titulo">Serviço Realizado</div>
                                    <div class="info-texto"></div>
                                </div>
                            </div>
                            <div class="info">
                                <div class="icon">
                                    <span class="material-symbols-outlined">calendar_month</span>
                                </div>
                                <div class="texto">
                                    <div class="info-titulo">Data do Serviço</div>
                                    <div class="info-texto"></div>
                                </div>
                            </div>
                            <div class="info">
                                <div class="icon">
                                    <span class="material-symbols-outlined">attach_money</span>
                                </div>
                                <div class="texto">
                                    <div class="info-titulo">Valor</div>
                                    <div class="info-texto">R$</div>
                                </div>
                            </div>
                            <div class="info">
                                <div class="icon">
                                    <span class="material-symbols-outlined">format_align_center</span>
                                </div>
                                <div class="texto">
                                    <div class="info-titulo">Descrição</div>
                                    <div class="info-texto"></div>
                                </div>
                            </div>
                            <div class="info">
                                <div class="icon">
                                    <span class="material-symbols-outlined">fact_check</span>
                                </div>
                                <div class="texto">
                                    <div class="info-titulo">Número do Contrato</div>
                                    <div class="info-texto"></div>
                                </div>
                            </div>
                        </div>

                   <button class="btn-pdf" onclick="document.location='{{ route('avaliacao') }}'">Avaliar</button>
                   <button class="btn-pdf" disabled>Contrato Avaliado</button>
        </div>
        </div>
@endsection

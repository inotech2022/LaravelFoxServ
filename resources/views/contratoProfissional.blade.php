@extends('layouts.main')

@section('title', 'Meus Contratos')
@section('nome')
não sei
@endsection
@section('content')

    <link rel="stylesheet" href="{{ asset('css/contratoProfissional.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
    <script src="{{ asset('js/modal.js') }}" defer></script>
    

    <main>
        <div class="principal">
            <div class="topo">
                <div class="titulo">
                    <h1>Meus contratos </h1>
                    <p>Confira seus contratos aqui</p>
                    <form method="GET">
                    <select name="filtro" onchange="this.form.submit()">
                        <option value="" selected disabled> Ordenar por </option>
                        <option value="nome"> Cliente </option>
                        <option value="dataInicial"> Data </option>
                    </select>
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
                            <span class="material-symbols-outlined">
                                contract
                            </span>
                        </div>
                        <div class="texto">
                            <div class="info-titulo">
                                   Status do Contrato
                            </div>
                            <div class="info-texto">
                               
                            </div>
                        </div>
                    </div>
                    <div class="info">
                        <div class="icon">
                            <span class="material-symbols-outlined">
                                person
                            </span>
                        </div>
                        <div class="texto">
                            <div class="info-titulo">
                                Nome do Cliente
                            </div>
                            <div class="info-texto">
                               
                            </div>
                        </div>
                    </div>
                    <div class="info">
                        <div class="icon">
                            <span class="material-symbols-outlined">
                                <span class="material-symbols-outlined">
                                    check_circle
                                </span>
                            </span>
                        </div>
                        <div class="texto">
                            <div class="info-titulo">
                                Serviço Realizado
                            </div>
                            <div class="info-texto">
                               
                            </div>
                        </div>
                    </div>
                    <div class="info">
                        <div class="icon">
                            <span class="material-symbols-outlined">
                                    calendar_month
                            </span>
                        </div>
                        <div class="texto">
                            <div class="info-titulo">
                                Data do Serviço
                            </div>
                            <div class="info-texto">
                            </div>
                        </div>
                    </div>
                    <div class="info">
                        <div class="icon">
                            <span class="material-symbols-outlined">
                                attach_money
                            </span>
                        </div>
                        <div class="texto">
                            <div class="info-titulo">
                                Valor
                            </div>
                            <div class="info-texto">
                                R$
                            </div>
                        </div>
                    </div>
                    <div class="info">
                        <div class="icon">
                            
                                <span class="material-symbols-outlined">
                                    format_align_center
                                </span>
                            
                        </div>
                        <div class="texto">
                            <div class="info-titulo">
                                Descrição
                            </div>
                            <div class="info-texto">
                               
                            </div>
                        </div>
                    </div>
                    <div class="info">
                        <div class="icon">
                            
                                <span class="material-symbols-outlined">
                                    fact_check
                                </span>
                           
                        </div>
                        <div class="texto">
                            <div class="info-titulo">
                                Número do Contrato
                            </div>
                            <div class="info-texto">
                                
                            </div>
                        </div>
                    </div>
                   
                </div>
                
                <div class="contrato-pdf">
                    
    <form method="post" action="#">
    <input type="hidden" name="protocolo" value="">
    <button type="submit" class="btn-pdf" name="gerar_pdf">Gerar PDF </button>
</form>

                    <button class="lixeira" onclick="abreModal('')">
            <span class="material-symbols-outlined">delete</span>
        </button>
                                <button class="editar" onclick="document.location='{{ route('editarContrato') }}'"><span class="material-symbols-outlined" >
                                    edit
                                </span></button>
                
                              
                </div>
               <div id="modal-" class="modal">
                    <div class="alert-modal">
                        <div class="modal-header">
                            <h1><span class="material-symbols-outlined">warning</span></h1>
                        </div>
                        <div class="modal-body">
                            <h2>Tem certeza que deseja excluir esse contrato ?</h2>
                            
                            <form id="form_excluir_contrato-" method="post" action="excluir_contrato.php">
                                <input type="hidden" name="protocolo" value="">
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button onclick="document.getElementById('form_excluir_contrato-').submit();" class="btn-modal">Sim</button>
                            <button class="btn-modal" onclick="fechaModal('modal-')">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<div onclick="document.location='cad_servico.php'" class="btn-flutuante">
            <span class="material-symbols-outlined">
                add
            </span>
        </div>
@endsection
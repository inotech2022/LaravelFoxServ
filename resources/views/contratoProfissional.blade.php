@extends('layouts.main')

@section('title', 'Meus Contratos')

@section('content')

<link rel="stylesheet" href="{{ asset('/css/contratoProfissional.css') }}">
<link rel="stylesheet" href="{{ asset('/css/modal.css') }}">
<script src="{{ asset('js/modal.js') }}" defer></script>

<main>
    <div class="principal">
        <div class="topo">
            <div class="titulo">
                <h1>Meus contratos</h1>
                <p>Confira seus contratos aqui</p>
                <form method="GET">
                    <select name="filtro" onchange="this.form.submit()">
                        <option value="" selected disabled> Ordenar por </option>
                        <option value="name"> Cliente </option>
                        <option value="startDate"> Data </option>
                    </select>
                </form>
            </div>
            <div class="image">
                <img src="image/contratos-modoClaro.png" class="img-right-modoClaro">
                <img src="image/contratos-modoEscuro.png" class="img-right-modoEscuro">
            </div>
        </div>

        <div class="profissionais">
            @if($contratos->isEmpty())
                <div class="naoEncontrada">
                    <h1>Você ainda não possui nenhum contrato</h1>
                    <img src="image/vazio-modoClaro.png" class="naoEncontrado-modoClaro">
                    <img src="image/vazio-modoEscuro.png" class="naoEncontrado-modoEscuro">
                </div>
            @else
                @foreach($contratos as $contrato)
                    <div class="contrato">
                        <div class="card_contrato">
                            <div class="info">
                                <div class="icon">
                                    <span class="material-symbols-outlined">contract</span>
                                </div>
                                <div class="texto">
                                    <div class="info-titulo">Status do Contrato</div>
                                    <div class="info-texto">{{ $contrato->statusContrato }}</div>
                                </div>
                            </div>
                            <div class="info">
                                <div class="icon">
                                    <span class="material-symbols-outlined">person</span>
                                </div>
                                <div class="texto">
                                    <div class="info-titulo">Nome do Cliente</div>
                                    <div class="info-texto">{{ $contrato->name }}</div>
                                </div>
                            </div>
                            <div class="info">
                                <div class="icon">
                                    <span class="material-symbols-outlined">check_circle</span>
                                </div>
                                <div class="texto">
                                    <div class="info-titulo">Serviço Realizado</div>
                                    <div class="info-texto">{{ $contrato->serviceName }}</div>
                                </div>
                            </div>
                            <div class="info">
                                <div class="icon">
                                    <span class="material-symbols-outlined">calendar_month</span>
                                </div>
                                <div class="texto">
                                    <div class="info-titulo">Data do Serviço</div>
                                    <div class="info-texto">
                                        {{ \Carbon\Carbon::parse($contrato->startDate)->format('d/m/Y') }} - 
                                        {{ \Carbon\Carbon::parse($contrato->endDate)->format('d/m/Y') }}
                                    </div>
                                </div>
                            </div>
                            <div class="info">
                                <div class="icon">
                                    <span class="material-symbols-outlined">attach_money</span>
                                </div>
                                <div class="texto">
                                    <div class="info-titulo">Valor</div>
                                    <div class="info-texto">R$ {{ $contrato->price }}</div>
                                </div>
                            </div>
                            <div class="info">
                                <div class="icon">
                                    <span class="material-symbols-outlined">format_align_center</span>
                                </div>
                                <div class="texto">
                                    <div class="info-titulo">Descrição</div>
                                    <div class="info-texto">{{ $contrato->description }}</div>
                                </div>
                            </div>
                            <div class="info">
                                <div class="icon">
                                    <span class="material-symbols-outlined">fact_check</span>
                                </div>
                                <div class="texto">
                                    <div class="info-titulo">Número do Contrato</div>
                                    <div class="info-texto">{{ $contrato->protocol }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="contrato-pdf">
                        <form method="GET" action="{{ route('contrato.gerarPdf', ['protocol' => $contrato->protocol]) }}">
                            <button type="submit" class="btn-pdf">Gerar PDF</button>
                        </form>
                            
                            <!-- Exemplo de um botão que abre o modal -->
                            <button class="lixeira" onclick="abreModal('{{ $contrato->protocol }}')">
                                <span class="material-symbols-outlined">delete</span>
                            </button>

                            <!-- Modal de Confirmação -->
                            <div class="modal" id="modal-{{ $contrato->protocol }}">
                                <div class="modal-content">
                                    <h2>Confirmação</h2>
                                    <p>Tem certeza de que deseja excluir este contrato?</p>
                                    <form method="POST" action="{{ route('contrato.destroy', ['protocol' => $contrato->protocol]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-confirmar">Sim</button>
                                        <button type="button" class="btn-cancelar" onclick="fechaModal('modal-{{ $contrato->protocol }}')">Não</button>
                                    </form>
                                </div>
                            </div>

                            <!-- Formulário de exclusão oculto -->
                            <form id="deleteForm-{{ $contrato->protocol }}" method="POST" action="{{ route('contrato.destroy', ['protocol' => $contrato->protocol]) }}" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>

                            <button class="editar" onclick="document.location='{{ route('editarContrato', ['protocol' => $contrato->protocol]) }}'">
                                <span class="material-symbols-outlined">edit</span>
                            </button>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <div  class="btn-flutuante">
                <a class="btn-flutuante"  href="{{ route('cadastroContrato.store') }}">
                <span class="material-symbols-outlined">
                    add
                </span>
                </a>
        </div>
    </div>
</main>
@endsection

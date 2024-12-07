@extends('layouts.header')

@section('title', 'Meus Contratos')

@section('content')

<link rel="stylesheet" href="{{ asset('/css/contratoProfissional.css') }}">
<link rel="stylesheet" href="{{ asset('css/modal.css') }}">
<link rel="stylesheet" href="{{ asset('css/alert.css') }}">
<script src="{{ asset('js/modal.js') }}" defer></script>
<script src="{{ asset('js/sweetalert2.js') }}"></script>
<script src="{{ asset('js/avali-publi.js') }}" defer></script>

<main>
@if(session('success'))
    <script>
   Swal.fire({
    title: 'Sucesso!',
    text: "{{ session('success') }}",
    icon: 'success',
    confirmButtonText: 'OK',
    customClass: {
        popup: 'my-swal-popup',
        title: 'my-swal-title',
        text: 'my-swal-text',
        confirmButton: 'my-swal-button',
    }
});

</script>
@endif
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
                <img src="https://foxservbucket.s3.us-east-1.amazonaws.com/contratos-modoClaro.png" class="img-right-modoClaro">
                <img src="https://foxservbucket.s3.us-east-1.amazonaws.com/contratos-modoEscuro.png" class="img-right-modoEscuro">
            </div>
        </div>

        <div class="profissionais">

        <div class="botoes">
                <button onclick="funcaoAparecerPublicacoes()" class="publi" id="publi">Meus Contratos </button>
                <button onclick="funcaoAparecerAvaliacoes()" class="avali" id="avali">Serviços Contratados </button>

        </div>





            <div class="publicacoes" id="publicacoes">
            @if($contratos->isEmpty())
                <div class="naoEncontrada">
                    <h1>Você ainda não possui nenhum contrato</h1>
                    <img src="https://foxservbucket.s3.us-east-1.amazonaws.com/vazio-modoClaro.png" class="naoEncontrado-modoClaro">
                    <img src="https://foxservbucket.s3.us-east-1.amazonaws.com/vazio-modoEscuro.png" class="naoEncontrado-modoEscuro">
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
                            <div id="modal-{{ $contrato->protocol }}" class="modal">
    <div class="alert-modal">
        <div class="modal-header">
            <h1><span class="material-symbols-outlined">warning</span></h1>
        </div>
        <div class="modal-body">
            <h2>Tem certeza que deseja excluir este contrato?</h2>
        </div>
        <div class="modal-footer">
            <!-- Formulário de exclusão do contrato -->
            <form method="POST" action="{{ route('contrato.destroy', ['protocol' => $contrato->protocol]) }}" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-modal">Sim</button>
            </form>
            <button class="btn-modal" onclick="closeModal('modal-{{ $contrato->protocol }}')">Cancelar</button>
        </div>
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


        <div class="avaliacoes" id="avaliacoes">
        @if($contratados->isEmpty())
            <div class="naoEncontrada">
                <h1>Você ainda não possui nenhum serviço contratado</h1>
                <img src="https://foxservbucket.s3.us-east-1.amazonaws.com/vazio-modoClaro.png" class="naoEncontrado-modoClaro">
                <img src="https://foxservbucket.s3.us-east-1.amazonaws.com/vazio-modoEscuro.png" class="naoEncontrado-modoEscuro">
            </div>
        @else
            @foreach($contratados as $contratado)
                <div class="contrato">
                    <div class="card_contrato">
                        <div class="info">
                            <div class="icon">
                                <span class="material-symbols-outlined">contract</span>
                            </div>
                            <div class="texto">
                                <div class="info-titulo">Status do Contrato</div>
                                <div class="info-texto">{{ $contratado->statusContrato }}</div>
                            </div>
                        </div>
                        <div class="info">
                            <div class="icon">
                                <span class="material-symbols-outlined">person</span>
                            </div>
                            <div class="texto">
                                <div class="info-titulo">Nome do Profissional</div>
                                <div class="info-texto">{{ $contratado->professionalName }}</div>
                            </div>
                        </div>
                        <div class="info">
                            <div class="icon">
                                <span class="material-symbols-outlined">check_circle</span>
                            </div>
                            <div class="texto">
                                <div class="info-titulo">Serviço Realizado</div>
                                <div class="info-texto">{{ $contratado->serviceName }}</div>
                            </div>
                        </div>
                        <div class="info">
                            <div class="icon">
                                <span class="material-symbols-outlined">calendar_month</span>
                            </div>
                            <div class="texto">
                                <div class="info-titulo">Data do Serviço</div>
                                <div class="info-texto">{{ \Carbon\Carbon::parse($contratado->startDate)->format('d/m/Y') }} - 
                                {{ \Carbon\Carbon::parse($contratado->endDate)->format('d/m/Y') }}</div>
                            </div>
                        </div>
                        <div class="info">
                            <div class="icon">
                                <span class="material-symbols-outlined">attach_money</span>
                            </div>
                            <div class="texto">
                                <div class="info-titulo">Valor</div>
                                <div class="info-texto">R$ {{ number_format($contratado->price, 2, ',', '.') }}</div>
                            </div>
                        </div>
                        <div class="info">
                            <div class="icon">
                                <span class="material-symbols-outlined">format_align_center</span>
                            </div>
                            <div class="texto">
                                <div class="info-titulo">Descrição</div>
                                <div class="info-texto">{{ $contratado->description }}</div>
                            </div>
                        </div>
                        <div class="info">
                            <div class="icon">
                                <span class="material-symbols-outlined">fact_check</span>
                            </div>
                            <div class="texto">
                                <div class="info-titulo">Número do Contrato</div>
                                <div class="info-texto">{{ $contratado->protocol }}</div>
                            </div>
                        </div>
                    </div>

                    @if($contratado->avaliado)
                        <button class="btn-pdf" disabled>Contrato Avaliado</button>
                    @else
                        <button class="btn-pdf" onclick="document.location='{{ route('avaliacao', ['protocol' => $contratado->protocol]) }}'">Avaliar</button>

                    @endif
                </div>
            @endforeach
        @endif
        </div>
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
@section('footer')
@include('layouts.footer')
@endsection
@extends('layouts.cadastro')

@section('title', 'Novo Contrato')

<link rel="stylesheet" href="{{ asset('css/cad_servico.css') }}">

@section('content')
<form class="card-form" action="{{ route('editarContrato.update', ['protocol' => $contract->protocol]) }})}}" method="POST" enctype="multipart/form-data">
    @csrf<!-- Isso indica que será um POST para atualizar o contrato -->

    <h1>Editar Contrato</h1>
    <h2>Altere os campos que você deseja atualizar</h2>

    <div class="linha">
        <div class="textfield">
            <label for="nome">Cliente</label>
            <input type="text" id="nome" name="nome" placeholder="000.000.000-00" value="{{ old('cpf', $contract->cpf) }}" disabled>
        </div>
    </div>

    <div class="linha">
        <div class="textfield">
            <label for="idServico">Serviço Realizado</label>
            <select name="idServico" id="idServico" size="1">
                <option value="{{ old('idServico', $contract->serviceId) }}" selected>{{ old('nomeServico', $contract->serviceName) }}</option>
                @foreach($servicos as $servico)
                    <option value="{{ $servico->serviceId }}">{{ $servico->serviceName }}</option>
                @endforeach
            </select>
        </div>

        <div class="textfield">
            <label for="valor">Valor do Serviço</label>
            <input type="text" name="valor" placeholder="Digite o valor" value="{{ old('valor', $contract->price) }}">
        </div>
    </div>

    <div class="linha">
        <div class="textfield">
            <label for="data_serv">Data inicial</label>
            <input type="date" name="dataInicial" id="data_serv_inicio" value="{{ old('dataInicial', $contract->startDate ? $contract->startDate->format('Y-m-d') : '') }}" required>
        </div>

        <div class="textfield">
            <label for="data_serv">Data final</label>
            <input type="date" name="dataFinal" id="data_serv_fim" value="{{ old('dataFinal', $contract->endDate ? $contract->endDate->format('Y-m-d') : '') }}" required>
        </div>
    </div>

    <div class="linha">
        <div class="input-box">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" placeholder="Descrição dos serviços, habilidades, idiomas..." required maxlength="100">{{ old('descricao', $contract->description ?? '') }}</textarea>
            <div class="characters">
                <span class="min_num">0</span>
                <span class="limit_num">/100</span>
            </div>
        </div>
    </div>

    <div class="botao">
        <input type="submit" name="submit" class="btn-login" id="submit" value="Editar">
    </div>

    <a class="voltar" href="{{ route('contratoProfissional') }}">Voltar</a>

</form>
@endsection
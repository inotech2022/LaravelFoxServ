@extends('layouts.main')

@section('title', 'Serviços')
@section('nome', 'não sei')

@section('content')

    <div class="servicos">
        <h1>Qual serviço de  você está precisando? - '{{ $service }}' </h1>
        <div class="botoes">
            <a href="{{ route ('profissionais', 1) }}" class="servico"> Nome do serviço <span class="material-symbols-outlined">
                arrow_forward</span> </a>
        </div>
        <br />
        <br />

    </div>
    
@endsection
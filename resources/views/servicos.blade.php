@extends('layouts.main')

@section('title', 'Serviços')
@section('nome', 'não sei')

@section('content')

    <div class="servicos">
        <h1>Qual serviço de  você está precisando? </h1>
        @foreach ($service as $serviceType)
        <div class="botoes">
            <a href="{{ route ('profissionais', 1) }}" class="servico"> Serviço: {{ $serviceType->serviceTypeName }} <span class="material-symbols-outlined">
                arrow_forward</span> </a>
        </div>
        @endforeach
        <br />
        <br />

    </div>
    
@endsection
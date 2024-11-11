@extends('layouts.main')

@section('title', 'Meu Desempenho')
<link rel="stylesheet" href="{{ asset('css/desempenho.css') }}">

@section('content')
    <div class="dashboard">
        <h3 class="titulo">Desempenho</h3>
        <section class="stats">
            <div class="card total-ganhos">
                <p>Ganhos Totais</p>
                <h2>R${{ number_format($ganhosTotais, 2, ',', '.') }}</h2>
                <span>Desde: {{ $dataInicio }}</span>
            </div>
            <div class="card avaliacoes">
                <p>Todos os Contratos</p>
                <div class="linha-2">
                    <h2>{{ $totalContratos }}</h2>
                    <span class="material-symbols-outlined">contract</span>
                </div>
                <p>Todas as Avaliações</p>
                <div class="linha-2">
                    <h2>{{ $totalAvaliacoes }}</h2>
                    <span class="material-symbols-outlined">reviews</span>
                </div>
            </div>
            <div class="card ganhos-atuais">
                <p>Ganhos atuais</p>
                <h2>R${{ number_format($ganhosAtuais, 2, ',', '.') }}</h2>
                <span>Mês: {{ $currentDate }}</span>
            </div>
            <div class="card contratos">
                <p>Contratos</p>
                <div class="linha-2">
                    <h2>{{ $contratosMes }}</h2>
                    <span class="material-symbols-outlined">contract</span>
                </div>
                <p>Avaliações</p>
                <div class="linha-2">
                    <h2>{{ $avaliacoesMes }}</h2>
                    <span class="material-symbols-outlined">reviews</span>
                </div>
            </div>
        </section>

        <div class="linha">
            <div class="coluna">
                <h3>Média de Avaliação</h3>
                <section class="reviews">
                    <ul>
                        <li>Julho <span>⭐ 4.8</span></li>
                        <li>Agosto <span>⭐ 4.7</span></li>
                        <li>Setembro (Atual) <span>⭐ 4.3</span></li>
                    </ul>
                </section>
                <section class="progress-circle">
                    <div class="circle">
                        <div class="circle-text">
                            <span>70.05%</span>
                            <span>8.89K</span>
                        </div>
                    </div>
                </section>
            </div>
            <div class="coluna">
                <h3>Gráfico de Ganhos mensais</h3>
                <section class="chart">
                <div class="grafico-container">
    <div class="valores-laterais">
        <div>400</div>
        <div>300</div>
        <div>200</div>
        <div>100</div>
        <div>0</div>
    </div>
    <div class="barras">
        @foreach (range(1, 12) as $mes)
            <div class="barra">
                @php $altura = $ganhosMensaisCompletos[$mes] * 300 / 400; @endphp
                <div class="barra-altura" style="height: {{ $altura }}px;">
                    <span class="valor-real">{{ number_format($ganhosMensaisCompletos[$mes], 2, ',', '.') }}</span>
                </div>
                <div class="label">{{ \Carbon\Carbon::create()->month($mes)->format('M') }}</div>
            </div>
        @endforeach
    </div>
</div>
                </section>
            </div>
        </div>
    </div>
@endsection
 
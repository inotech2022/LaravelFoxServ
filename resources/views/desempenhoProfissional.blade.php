@extends('layouts.header')

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
    <h4>Gráfico de Avaliações por Estrela</h4>
    <div class="pizza-e-legenda">
        <section class="pizza-chart">
            <canvas id="pizzaChart"></canvas>
        </section>
        <section class="reviews">
            <ul>
                <li><span style="color: #FF0000;">★</span> 1 Estrela</li>
                <li><span style="color: #FF7F00;">★</span> 2 Estrelas</li>
                <li><span style="color: #FFFF00;">★</span> 3 Estrelas</li>
                <li><span style="color: #7FFF00;">★</span> 4 Estrelas</li>
                <li><span style="color: #00FF00;">★</span> 5 Estrelas</li>
            </ul>
        </section>
    </div>
</div>

        <div class="coluna">
            <h4>Gráfico de Ganhos mensais</h4>
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
                                @php
                                    $valorMensal = $ganhosMensaisCompletos[$mes] ?? 0;
                                    $altura = $valorMensal * 300 / 400;
                                @endphp
                                <div class="barra-altura" style="height: {{ $altura }}px;">
                                    <span class="valor-real">R${{ number_format($valorMensal, 2, ',', '.') }}</span>
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

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('pizzaChart').getContext('2d');
    var pizzaChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['1 Estrela', '2 Estrelas', '3 Estrelas', '4 Estrelas', '5 Estrelas'],
            datasets: [{
                data: [
                    {{ $avaliacoesPorEstrela[1] ?? 0 }},
                    {{ $avaliacoesPorEstrela[2] ?? 0 }},
                    {{ $avaliacoesPorEstrela[3] ?? 0 }},
                    {{ $avaliacoesPorEstrela[4] ?? 0 }},
                    {{ $avaliacoesPorEstrela[5] ?? 0 }}
                ],
                backgroundColor: ['#FF0000', '#FF7F00', '#FFFF00', '#7FFF00', '#00FF00']
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
</script>

@endsection
@section('footer')
@include('layouts.footer')
@endsection
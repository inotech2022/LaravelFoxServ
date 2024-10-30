@extends('layouts.main')

@section('title', 'Meu Desempenho')
<link rel="stylesheet" href="{{ asset('css/desempenho.css') }}">
@section('content')
            <div class="dashboard">
                <h3 class="titulo">Desempenho</h3>
                <section class="stats">
                    <div class="card total-ganhos">
                        <p>Ganhos Totais</p>
                        <h2>$3.97M</h2>
                        <span>Desde: Agosto/2024</span>
                    </div>
                    <div class="card avaliacoes">
                        <p>Todos os Contratos</p>
                         <div class="linha-2">
                        <h2>12</h2>
                        <span class="material-symbols-outlined">
contract
</span>
</div>
                        <p>Todas as Avaliações</p>
                         <div class="linha-2">
                        <h2>12</h2>
                        <span class="material-symbols-outlined">
reviews
</span>
</div>
                    </div>
                    <div class="card ganhos-atuais">
                        <p>Ganhos atuais</p>
                        <h2>3.15K</h2>
                        <span>Mês: Setembro/2024</span>
                    </div>
                    <div class="card contratos">
                        <p>Contratos</p>
                        <div class="linha-2">
                        <h2>10</h2>
                        <span class="material-symbols-outlined">
contract
</span>
</div>
                        <p>Avaliações</p>
                        <div class="linha-2">
                        <h2>10</h2>
                        <span class="material-symbols-outlined">
reviews
</span>
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
 <h3>Grafico de Ganhos mensais</h3>
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
            <div class="barra">
                <div class="barra-altura" style="height: 150px;">
                    <span class="valor-real">150</span>
                </div>
                <div class="label">Mar</div>
            </div>
            <div class="barra">
                <div class="barra-altura" style="height: 250px;">
                    <span class="valor-real">250</span>
                </div>
                <div class="label">Abr</div>
            </div>
            <div class="barra">
                <div class="barra-altura" style="height: 300px;">
                    <span class="valor-real">300</span>
                </div>
                <div class="label">Mai</div>
            </div>
            <div class="barra">
                <div class="barra-altura" style="height: 300px;">
                    <span class="valor-real">300</span>
                </div>
                <div class="label">Jun</div>
            </div>
            <div class="barra">
                <div class="barra-altura" style="height: 250px;">
                    <span class="valor-real">250</span>
                </div>
                <div class="label">Jul</div>
            </div>
            <div class="barra">
                <div class="barra-altura" style="height: 300px;">
                    <span class="valor-real">300</span>
                </div>
                <div class="label">Ago</div>
            </div>
            <div class="barra">
                <div class="barra-altura" style="height: 280px;">
                    <span class="valor-real">280</span>
                </div>
                <div class="label">Set</div>
            </div>
        </div>
    </div>
</section>

@endsection

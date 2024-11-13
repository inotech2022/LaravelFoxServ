@extends('layouts.header')

@section('title', 'Home')
@section('nome')
não sei
@endsection
@section('content')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">

        <div class="inicio">
            <div class="inicio-left">
                <h1 class="frase"> Cadastre seus serviços </br> e descubra novas formas </br> de conexão </h1>
                <p>Analise as categorias disponíveis</p>
                <div class="pesquisa">
                    <input type="text" placeholder="Buscar serviço...">
                    <button><span class="material-symbols-outlined">
                        search
                        </span></button>
                </div>
            </div>
            <div class="inicio-right">
                <img class="animated" id="img-right-modoClaro" src="image/home-modoClaro.svg">
            <img class="animated" id="img-right-modoEscuro" src="image/home-modoEscuro.svg">
            </div>
        </div>

        <div class="servicos">
            <div class="categorias">
                <h2>Nossos serviços</h2>
                <div class="cards">
                    <div class="card">
                        <div class="icon">
                            <img class="img_icon-modoClaro " src="image/familia-modoClaro.png">
                            <img class="img_icon-modoEscuro " src="image/familia-modoEscuro.png">
                        </div>
                        <h3>Família</h3>
                        <div class="acessar">
                            <a href="servicos.php?tipoServico=1"> Acessar </a><span class="material-symbols-outlined">
                                arrow_forward
                            </span>
                        </div>
                    </div>
                    <div class="card">
                        <div class="icon">
                            <img class="img_icon-modoClaro " src="image/educacao-modoClaro.png">
                            <img class="img_icon-modoEscuro " src="image/educacao-modoEscuro.png">
                        </div>
                        <h3>Educação</h3>
                        <div class="acessar">
                            <a href="servicos.php?tipoServico=2"> Acessar </a><span class="material-symbols-outlined">
                                arrow_forward
                            </span>
                        </div>
                    </div>
                    <div class="card">
                        <div class="icon">
                            <img class="img_icon-modoClaro " src="image/tecnologia-modoClaro.png">
                            <img class="img_icon-modoEscuro " src="image/tecnologia-modoEscuro.png">
                        </div>
                        <h3>Tecnologia</h3>
                        <div class="acessar">
                            <a href="servicos.php?tipoServico=3"> Acessar </a><span class="material-symbols-outlined">
                                arrow_forward
                            </span>
                        </div>
                    </div>
                    <div class="card">
                        <div class="icon">
                            <img class="img_icon-modoClaro " src="image/reparos-modoClaro.png">
                            <img class="img_icon-modoEscuro " src="image/reparos-modoEscuro.png">
                        </div>
                        <h3>Reparos</h3>
                        <div class="acessar">
                            <a href="servicos.php?tipoServico=4"> Acessar </a><span class="material-symbols-outlined">
                                arrow_forward
                            </span>
                        </div>
                    </div>
                    <div class="card">
                        <div class="icon">
                            <img class="img_icon-modoClaro " src="image/assTec-modoClaro.png">
                            <img class="img_icon-modoEscuro " src="image/assTec-modoEscuro.png">
                        </div>
                        <h3>Ass. Técnica</h3>
                        <div class="acessar">
                            <a href="servicos.php?tipoServico=5"> Acessar </a> <span class="material-symbols-outlined">
                                arrow_forward
                            </span>
                        </div>
                    </div>
                    <div class="card">
                        <div class="icon">
                            <img class="img_icon-modoClaro " src="image/moda-modoClaro.png">
                            <img class="img_icon-modoEscuro " src="image/moda-modoEscuro.png">
                        </div>
                        <h3>Moda</h3>
                        <div class="acessar">
                            <a href="servicos.php?tipoServico=6"> Acessar </a> <span class="material-symbols-outlined">
                                arrow_forward
                            </span>
                        </div>
                    </div>
                    <div class="card">
                        <div class="icon">
                            <img class="img_icon-modoClaro " src="image/saude-modoClaro.png">
                            <img class="img_icon-modoEscuro " src="image/saude-modoEscuro.png">
                        </div>
                        <h3>Saúde</h3>
                        <div class="acessar">
                            <a href="servicos.php?tipoServico=7"> Acessar </a><span class="material-symbols-outlined">
                                arrow_forward
                            </span>
                        </div>
                    </div>
                    <div class="card">
                        <div class="icon">
                            <img class="img_icon-modoClaro " src="image/artesanato-modoClaro.png">
                            <img class="img_icon-modoEscuro " src="image/artesanato-modoEscuro.png">
                        </div>
                        <h3>Artesanato</h3>
                        <div class="acessar">
                            <a href="servicos.php?tipoServico=8"> Acessar </a><span class="material-symbols-outlined">
                                arrow_forward
                            </span>
                        </div>
                    </div>
                    <div class="card">
                        <div class="icon">
                            <img class="img_icon-modoClaro " src="image/beleza-modoClaro.png">
                            <img class="img_icon-modoEscuro " src="image/beleza-modoEscuro.png">
                        </div>
                        <h3>Beleza</h3>
                        <div class="acessar">
                            <a href="servicos.php?tipoServico=9"> Acessar </a><span class="material-symbols-outlined">
                                arrow_forward
                            </span>
                        </div>
                    </div>
                    <div class="card">
                        <div class="icon">
                            <img class="img_icon-modoClaro " src="image/eventos-modoClaro.png">
                            <img class="img_icon-modoEscuro " src="image/eventos-modoEscuro.png">
                        </div>
                        <h3>Eventos</h3>
                        <div class="acessar">
                            <a href="servicos.php?tipoServico=10"> Acessar </a><span class="material-symbols-outlined">
                                arrow_forward
                            </span>
                        </div>
                    </div>
                </div>
                <form class="sugestao" action="{{route('index')}}" method="POST" enctype="multipart/form-data">
                    <p>Não encontrou o serviço que está procurando?</p>
                    <input type="text" class="sugestao" id="sugestao" name="sugestao" placeholder="Deixe aqui a sua sugestão...">
                    <input type="submit" class="submit" name="submit" value=">"></input>
                </form>
            </div>
        </div>
            <div class="avaliacoes">
                <h2>O que estão falando sobre a plataforma:</h2>
                <div class="avaliacao">
                    <div class="left-img">
                        <img src="image/comentarios-modoClaro.png" class="img-avaliacao-modoClaro">
                        <img src="image/comentario-modoEscuro.png" class="img-avaliacao-ModoEscuro">
                        <div class="botao">
                <button onclick="document.location='avaliPlat.php'">Avalie a plataforma</button>
            </div>
                    </div>
                    <div class="right-av">
                                           <div class="cards">
                        <div class="card-av">
                            <div class="av-header">
                                <div class="header-img">
                                    <img src="upload/PedroSilva.jpg" class="image-header">
                                </div>
                                <div class="header-info">
                                    <h4>Pedro Silva</h4>
                                    <p>12/08/2023</p>
                                </div>
                                <div class="aspas">
                                    <span class="material-symbols-outlined">
                                        format_quote
                                    </span>
                                </div>
                            </div>
                            <div class="estrela">
                                <ul class="estrela-av">
                                    <li class="star-icon" data-avaliacao="1"></li>
                                    <li class="star-icon" data-avaliacao="2"></li>
                                    <li class="star-icon" data-avaliacao="3"></li>
                                    <li class="star-icon" data-avaliacao="4"></li>
                                    <li class="star-icon ativo" data-avaliacao="5"></li>
                                </ul>
                            </div>
                            <div class="comentario">
                                <p>O profissional foi excelente no atendimento, o serviço que me prestou ficou impecavel, estou muito feliz com o resultado!</p>
                            </div>
                        </div>
                        <div class="card-av">
                            <div class="av-header">
                                <div class="header-img">
                                    <img src="upload/JuliaGabriele.jpg" class="image-header">
                                </div>
                                <div class="header-info">
                                    <h4>Julia Gabriele</h4>
                                    <p>29/10/2023</p>
                                </div>
                                <div class="aspas">
                                    <span class="material-symbols-outlined">
                                        format_quote
                                    </span>
                                </div>
                            </div>
                            <div class="estrela">
                                <ul class="estrela-av">
                                    <li class="star-icon" data-avaliacao="1"></li>
                                    <li class="star-icon" data-avaliacao="2"></li>
                                    <li class="star-icon" data-avaliacao="3"></li>
                                    <li class="star-icon" data-avaliacao="4"></li>
                                    <li class="star-icon ativo" data-avaliacao="5"></li>
                                </ul>
                            </div>
                            <div class="comentario">
                                <p>Adorei o serviço que contratei, a plataforma me ajudou a encontrar uma profissional excelente!</p>
                            </div>
                        </div>
                        <div class="card-av">
                            <div class="av-header">
                                <div class="header-img">
                                    <img src="upload/LucasAlmeida.jpg" class="image-header">
                                </div>
                                <div class="header-info">
                                    <h4>Lucas Almeida</h4>
                                    <p>17/10/2023</p>
                                </div>
                                <div class="aspas">
                                    <span class="material-symbols-outlined">
                                        format_quote
                                    </span>
                                </div>
                            </div>
                            <div class="estrela">
                                <ul class="estrela-av">
                                    <li class="star-icon" data-avaliacao="1"></li>
                                    <li class="star-icon" data-avaliacao="2"></li>
                                    <li class="star-icon" data-avaliacao="3"></li>
                                    <li class="star-icon" data-avaliacao="4"></li>
                                    <li class="star-icon ativo" data-avaliacao="5"></li>
                                </ul>
                            </div>
                            <div class="comentario">
                                <p>O profissional fez um trabalho excepcional, superando minhas expectativas. Recomendo a todos!</p>
                            </div>
                        </div>
                        <div class="card-av">
                            <div class="av-header">
                                <div class="header-img">
                                    <img src="upload/CamilaSouza.jpg"" class="image-header">
                                </div>
                                <div class="header-info">
                                    <h4>Camila Souza</h4>
                                    <p>03/11/2023</p>
                                </div>
                                <div class="aspas">
                                    <span class="material-symbols-outlined">
                                        format_quote
                                    </span>
                                </div>
                            </div>
                            <div class="estrela">
                                <ul class="estrela-av">
                                    <li class="star-icon" data-avaliacao="1"></li>
                                    <li class="star-icon" data-avaliacao="2"></li>
                                    <li class="star-icon" data-avaliacao="3"></li>
                                    <li class="star-icon" data-avaliacao="4"></li>
                                    <li class="star-icon ativo" data-avaliacao="5"></li>
                                </ul>
                            </div>
                            <div class="comentario">
                                <p>Estou muito satisfeito com o profissional contratado e o serviço prestado e definitivamente usarei a plataforma novamente.</p>
                            </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="faq">
                <div class="faq-card">
                    <h3> Perguntas Frequentes (FAQ)</h3>
                    <div class="perguntas">
                        <div class="pergunta-resposta">
                            <div class="pergunta">
                                <p>A plataforma é responsável pelos orçamentos?</p>
                                <span class="material-symbols-outlined">
                                    add
                                </span>
                            </div>
                            <div class="resposta">
                                <p>Não, o orçamento é feito diretamente com o cliente. Sendo assim, vocês podem decidir valores, datas, local, etc.</p>
                            </div>
                        </div>
                        <hr>
                        <div class="pergunta-resposta">
                            <div class="pergunta">
                                <p>Como faço para receber avaliações?</p>
                                <span class="material-symbols-outlined">
                                    add
                                </span>
                            </div>
                            <div class="resposta">
                                <p>As avaliações são feitas através dos contratos que você registra com o cliente, após gerado, não esqueça de solicitar que ele avalie seu serviço!</p>
                            </div>
                        </div>
                        <hr>
                        <div class="pergunta-resposta">
                            <div class="pergunta">
                                <p>Posso contratar profissionais também?</p>
                                <span class="material-symbols-outlined">
                                    add
                                </span>
                            </div>
                            <div class="resposta">
                                <p> Sim, mesmo sendo profissional na plataforma, você pode usufruir dos benefícios como usuário e contratar outros profissionais.</p>
                            </div>
                        </div>
                        <hr>
                        <div class="pergunta-resposta">
                            <div class="pergunta">
                                <p>Posso alterar os serviços que eu presto?</p>
                                <span class="material-symbols-outlined">
                                    add
                                </span>
                            </div>
                            <div class="resposta">
                                <p> Sim, através da aba "<a class="link_resposta" href="editarDados.html">Editar Perfil</a>" você pode adicionar ou alterar os seus serviços.</p>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
            @endsection
@section('footer')
@include('layouts.footer')
@endsection
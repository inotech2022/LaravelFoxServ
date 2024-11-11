@extends('layouts.main')

@section('title', 'Home')
@section('content')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
        <div class="inicio">
            <div class="inicio-left">
    <h1 class="frase">Os melhores serviços pelos<br> melhores preços</h1>
    <p>Te conectamos com profissionais <br> qualificados e confiáveis</p>
    <form class="card-form" action="profissionais2.php" method="GET">
        <div class="pesquisa">
            <input type="text" id="servico" name="nomeServico" placeholder="Buscar serviço...">
            
            <button type="submit" name="submit" id="submit">
                <span class="material-symbols-outlined">
                    search
                </span>
            </button>
        </div>
    </form>
</div>



            <div class="inicio-right">
                <img class="animated" id="img-right-modoClaro" src="image/home-modoClaro.svg">
            <img class="animated" id="img-right-modoEscuro" src="image/home-modoEscuro.svg">
            </div>
        </div>
<script type='text/javascript'>document.addEventListener('DOMContentLoaded', function () {window.setTimeout(document.querySelector('svg').classList.add('animated'),1000);})</script>
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
                            <a href="{{ route('servicos', 1) }}"> Acessar </a><span class="material-symbols-outlined">
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
                            <a href="{{ route('servicos', 2) }}"> Acessar </a><span class="material-symbols-outlined">
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
                            <a href="{{ route('servicos', 3) }}"> Acessar </a><span class="material-symbols-outlined">
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
                            <a href="{{ route('servicos', 4) }}"> Acessar </a><span class="material-symbols-outlined">
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
                            <a href="{{ route('servicos', 5) }}"> Acessar </a> <span class="material-symbols-outlined">
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
                            <a href="{{ route('servicos', 6) }}"> Acessar </a> <span class="material-symbols-outlined">
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
                            <a href="{{ route('servicos', 7) }}"> Acessar </a><span class="material-symbols-outlined">
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
                            <a href="{{ route('servicos', 8) }}"> Acessar </a><span class="material-symbols-outlined">
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
                            <a href="{{ route('servicos', 9) }}"> Acessar </a><span class="material-symbols-outlined">
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
                            <a href="{{ route('servicos', 10) }}"> Acessar </a><span class="material-symbols-outlined">
                                arrow_forward
                            </span>
                        </div>
                    </div>
                </div>
                <form class="sugestao" action="{{ route('sugestao') }}" method="POST">
                    @csrf
                    <p>Não encontrou o serviço que está procurando?</p>
                    <input type="text" class="sugestao" id="sugestao" name="sugestao" placeholder="Deixe aqui a sua sugestão...">
                    <input type="submit" class="submit" name="submit" value=">">
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
                <button onclick="document.location='{{route('avaliacaoPlataforma')}}'">Avalie a plataforma</button>
            </div>
                </div>
                <div class="right-av">
                                       <div class="cards">
                        <div class="card-av">
                            <div class="av-header">
                                <div class="header-img">
                                    <img src="image/upload/PedroSilva.jpg" class="image-header">
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
                                    <img src="image/upload/JuliaGabriele.jpg" class="image-header">
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
                                    <img src="image/upload/LucasAlmeida.jpg" class="image-header">
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
                                    <img src="image/upload/CamilaSouza.jpg" class="image-header">
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
                            <p>Qualquer um pode se tornar profissional?</p>
                            <span class="material-symbols-outlined">
                                add
                            </span>
                        </div>
                        <div class="resposta">
                            <p>Sim, a partir de 15 anos, qualquer um pode se tornar profissional na plataforma.</p>
                        </div>
                    </div>
                    <hr>
                    <div class="pergunta-resposta">
                        <div class="pergunta">
                            <p>Como posso entrar em contato com o profissional?</p>
                            <span class="material-symbols-outlined">
                                add
                            </span>
                        </div>
                        <div class="resposta">
                            <p>Através do perfil do profissional, você tem acesso aos meios de contato (Sendo eles, telefone e whatsapp).</p>
                        </div>
                    </div>
                    <hr>
                    <div class="pergunta-resposta">
                        <div class="pergunta">
                            <p>É possivel realizar contratos dentro da plataforma?</p>
                            <span class="material-symbols-outlined">
                                add
                            </span>
                        </div>
                        <div class="resposta">
                            <p>Apesar de todas as informações serem acordadas fora da plataforma (data, valores, local, etc.) é possivel sim gerar um contrato pela plataforma preenchendo essas informações.</p>
                        </div>
                    </div>
                    <hr>
                    <div class="pergunta-resposta">
                        <div class="pergunta">
                            <p>Como posso avaliar o profissional?</p>
                            <span class="material-symbols-outlined">
                                add
                            </span>
                        </div>
                        <div class="resposta">
                            <p>A avaliação é realizada a partir do seu contrato com o profissional, basta acessar a aba "<a class="link_resposta" href="contrato_cliente.php">Meus Serviços Contratados</a>" e escolher o serviço que deseja avaliar.</p>
                        </div>
                    </div>
                    <hr>
                    <div class="pergunta-resposta">
                        <div class="pergunta">
                            <p>Quais são as formas de pagamento?</p>
                            <span class="material-symbols-outlined">
                                add
                            </span>
                        </div>
                        <div class="resposta">
                            <p>O pagamento será decidido e realizado diretamente com o profissional fora da plataforma. A foxServ não se responsabiliza pelos pagamentos!</p>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
        @endsection


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/resources/css/cad_servico.css">
    <link rel="icon" href="logo/lilas-2.PNG">
    <script src="/resources/js/modo_escuro.js" defer></script>
    <script src="/resources/js/limiteTexto.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <title>Cadastrar Serviços</title>
</head>

<body>


    <div class="main">
        <div class="left">
            <div class="logo-header">

                <h1 class="logo"><a href="homeProf.php"> Fox<span class="foxserv">Serv</span></a></h1>
                <div class="modo_escuro">
                    <input type="checkbox" name="change-theme" id="change-theme" />
                    <label for="change-theme">
                        <i class="bi bi-sun"></i>
                        <i class="bi bi-moon"></i></label>
                </div>
            </div>
            <form class="card-form" action="cad_servico.php" method="POST" enctype="multipart/form-data">
                <h1>Cadastrar Serviço</h1>
                <h2>Preencha os campos para gerar o contrato do serviço</h2>
                <div class="linha">
                    <div class="textfield">
                        <label for="cpf">CPF do Cliente <span class="required"> * </span></label>
                        <input type="text" id="cpf" name="cpf" placeholder="000.000.000-00">
                    </div>

                </div>
                <div class="linha">
                    <div class="textfield">
                            <label for="idServico">Serviço Realizado <span class="required"> * </span></label>
                            <select name="idServico" id="idServico" size="1">
    <option value="" selected disabled>Escolha o serviço</option>
</select>

                        </div>
                    <div class="textfield">
                        <label for="valor">Valor do Serviço </label>
                        <input type="text" name="valor" id="valor" placeholder="Digite o valor">
                    </div>
                </div>
                <div class="linha">
                    <div class="textfield">
                        <label for="dataInicial">Data inicial <span class="required"> * </span></label>
                        <input type="date" name="dataInicial" id="dataInicial" placeholder="00/00/0000" required>
                    </div>
                    <div class="textfield">
                        <label for="dataFinal">Data final <span class="required"> * </span></label>
                        <input type="date" name="dataFinal" id="dataFinal" placeholder="00/00/0000" required>
                    </div>
                </div>
                <div class="linha">
                    <div class="input-box">
                        <label for="descricao">Descrição <span class="required"> * </span></label>
                        <textarea name="descricao" id="descricao" placeholder="Descreva serviço realizado... " required maxlength="100"></textarea>

                        <div class="characters">
                          <span class="min_num">0</span>
                          <span class="limit_num">/100</span>
                        </div>
                      </div>

                </div>

                <div class="botao">
                    <input type="submit" name="submit" class="btn-login" id="submit" value="Cadastrar"></input>
                </div>

                <a class="voltar" href="contratos.php">Voltar</a>


            </form>
        </div>
        <div class="right">
            <img src="image/novoServ-modoClaro.png" class="img-right-modoClaro">
            <img src="image/novoServ-modoEscuro.png" class="img-right-modoEscuro">
        </div>
    </div>
</body>

</html>

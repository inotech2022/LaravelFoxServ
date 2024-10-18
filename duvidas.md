- AS SUBCATEGORIAS NÃO ESTÃO SENDO EXIBIDAS NA TELA DE CADASTRO DO PROFISSIONAL
    - O script não funciona fora da view, por isso foi colocado no mesmo arquivo (gambiarra - pois também não funciona dentro)
    - As subcategorias deveriam ser exibidas ao selecionar uma categoria
    - O cadastro não é realizado - pois não há informações para serem salvas
    - Nenhum erro é exibido 

info:
services - subcategoria
serviceTypes - subcategoria





Alterar os links para direcionar as rotas e não para os arquivos:
Exemplo na index:

<h3>Família</h3>
<div class="acessar">
    <a href="servicos.php?tipoServico=1"> Acessar </a><span class="material-symbols-outlined">
        arrow_forward
    </span>
</div>


Trocar para:

<div class="acessar">
    <a href="{{ route('servicos', 1) }}"> Acessar </a><span class="material-symbols-outlined">
        arrow_forward
    </span>
</div>


Rotas:
Route::get('/servicos/{id}', [ServicosController::class, 'index'])->name('servicos');



Links para os arquivos em publico pode ser feito diretamente, por exemplo:

<link rel="stylesheet" href="/css/footer.css"> 
<link rel="stylesheet" href="/css/home.css">
<link rel="icon" href="/logo/lilas-2.PNG">




<button class="servico" onclick="document.location='profissionais.php?idServico=x'"> Nome do serviço 
    <span class="material-symbols-outlined">arrow_forward</span> </button>


    
<a href="{{ route ('profissionais', $idservico) }}" class="servico"> Nome do serviço <span class="material-symbols-outlined">arrow_forward</span> </a>
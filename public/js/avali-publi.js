const publicacoes = document.querySelector(".publicacoes");
const avaliacoes = document.querySelector(".avaliacoes" );
const publi = document.querySelector(".publi");
const avali = document.querySelector(".avali");

function funcaoAparecerAvaliacoes() {
    publicacoes.style.display = "none";
    avaliacoes.style.display = "flex";
}



function funcaoAparecerPublicacoes() {
    publicacoes.style.display = "flex";
    avaliacoes.style.display = "none";
}

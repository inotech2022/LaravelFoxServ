document.addEventListener("DOMContentLoaded", function() {
    const avaliacoes = document.querySelector(".avaliacoes");
    const sugestoes = document.querySelector(".sugestoes");
    const denuncias = document.querySelector(".denuncias");

    const avali = document.querySelector(".avali");
    const sugest = document.querySelector(".sugest");
    const denun = document.querySelector(".denun");

    function funcaoAparecerAvaliacoes() {
        if (avaliacoes && sugestoes && denuncias) {
            avaliacoes.style.display = "flex";
            sugestoes.style.display = "none";
            denuncias.style.display = "none";
            localStorage.setItem("ultimaSecao", "avaliacoes"); 
        }
    }

    function funcaoAparecerSugestoes() {
        if (avaliacoes && sugestoes && denuncias) {
            avaliacoes.style.display = "none";
            sugestoes.style.display = "flex";
            denuncias.style.display = "none";
            localStorage.setItem("ultimaSecao", "sugestoes"); 
        }
    }

    function funcaoAparecerDenuncias() {
        if (avaliacoes && sugestoes && denuncias) {
            avaliacoes.style.display = "none";
            sugestoes.style.display = "none";
            denuncias.style.display = "flex";
            localStorage.setItem("ultimaSecao", "denuncias"); 
        }
    }

    
    function restaurarSecao() {
        const ultimaSecao = localStorage.getItem("ultimaSecao");
        if (ultimaSecao === "sugestoes") {
            funcaoAparecerSugestoes();
        } else if (ultimaSecao === "denuncias") {
            funcaoAparecerDenuncias();
        } else {
            funcaoAparecerAvaliacoes(); 
        }
    }

    
    if (avali && sugest && denun) {
        avali.addEventListener("click", funcaoAparecerAvaliacoes);
        sugest.addEventListener("click", funcaoAparecerSugestoes);
        denun.addEventListener("click", funcaoAparecerDenuncias);
    } else {
        console.error("Um ou mais elementos de botão não foram encontrados.");
    }

    
    restaurarSecao();
});

function curtir(idPublicacao) {
    var coracao = document.getElementById('coracao_' + idPublicacao);
    var contador = document.getElementById('contador_' + idPublicacao);

    fetch('/toggle-like', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        body: JSON.stringify({ publicationId: idPublicacao })
    })
    .then(response => response.json())
    .then(data => {
        if (data.curtido) {
            coracao.classList.add('selected');
        } else {
            coracao.classList.remove('selected');
        }
        contador.textContent = data.curtidas;
    })
    .catch(error => console.error('Erro ao curtir:', error));
}

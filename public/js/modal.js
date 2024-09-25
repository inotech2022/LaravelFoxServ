function openModal(mn){
let modal = document.getElementById(mn);

if (typeof modal == 'undefined || modal === null')
return;

modal.style.display = 'block';
}



function closeModal(mn){
    let modal = document.getElementById(mn);

if (typeof modal == 'undefined || modal === null')
return;
modal.style.display = 'none';
}



function abreModal(protocolo) {
document.getElementById('modal-' + protocolo).style.display = 'block';
}

function fechaModal(modalId) {
document.getElementById(modalId).style.display = 'none';
}

function openModal(modalId) {
    let modal = document.getElementById(modalId);
    
    if (typeof modal === 'undefined' || modal === null) return;

    modal.style.display = 'block';
}

function closeModal(modalId) {
    let modal = document.getElementById(modalId);
    
    if (typeof modal === 'undefined' || modal === null) return;
    
    modal.style.display = 'none';
}

function abreModal(protocolo) {
    openModal('modal-' + protocolo);
}

function fechaModal(modalId) {
    closeModal(modalId);
}

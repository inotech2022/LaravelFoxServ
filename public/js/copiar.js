document.addEventListener('DOMContentLoaded', () => {
    const copyButton = document.getElementById('copyPhoneButton');

    if (!copyButton) {
        console.error('Elemento #copyPhoneButton não encontrado');
        return;
    }

    copyButton.addEventListener('click', function(event) {
        event.preventDefault(); // Evita o comportamento padrão do link.

        const phoneNumberElement = document.getElementById('phoneNumber');
        if (!phoneNumberElement) {
            console.error('Elemento #phoneNumber não encontrado');
            return;
        }

        const phoneNumber = phoneNumberElement.textContent.trim();

        const tempInput = document.createElement('input');
        tempInput.value = phoneNumber;
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand('copy');
        document.body.removeChild(tempInput);

        const feedback = document.getElementById('feedback');
        if (feedback) {
            feedback.style.display = 'block';
            setTimeout(() => feedback.style.display = 'none', 2000);
        }
    });
});

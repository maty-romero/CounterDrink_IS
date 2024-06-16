document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('formUsuario');
    const nombre = document.querySelector('input[name="name"]');
    const contrasena = document.querySelector('input[name="contrasena"]');
    const rol_usuario = document.querySelector('select[name="rol_usuario"]');
    const email = document.querySelector('input[name="email"]');
    const submitButton = document.getElementById('crear-cuenta-btn-id');

    submitButton.addEventListener('click', function (event) {
        event.preventDefault(); 
        clearErrorMessages();

        const nombreValue = nombre ? nombre.value.trim() : '';
        const contrasenaValue = contrasena ? contrasena.value.trim() : '';
        const emailValue = email ? email.value.trim() : '';
        const rolUsuarioValue = rol_usuario ? rol_usuario.value.trim() : '';

        let isValid = true;

        if (nombreValue === '') {
            showError(nombre, 'El nombre es obligatorio.');
            isValid = false;
        } else if (!/^[A-Za-z\s]+$/.test(nombreValue)) {
            showError(nombre, 'El nombre solo puede contener letras y espacios.');
            isValid = false;
        }

        if (contrasenaValue === '') {
            showError(contrasena, 'La contraseña es obligatoria.');
            isValid = false;
        } else if (contrasenaValue.length < 8) {
            showError(contrasena, 'La contraseña debe tener al menos 8 caracteres.');
            isValid = false;
        }

        if (emailValue === '') {
            showError(email, 'El correo electrónico es obligatorio.');
            isValid = false;
        } else if (!/^[^\s@]+@gmail\.com$/.test(emailValue)) {
            showError(email, 'Introduce un correo electrónico de Gmail válido.');
            isValid = false;
        }

        if (rol_usuario && rolUsuarioValue === '') {
            showError(rol_usuario, 'Debe seleccionar un tipo de usuario.');
            isValid = false;
        }

        if (isValid) {
            console.log('Formulario válido.');
            form.submit(); 
        }
    });

    function clearErrorMessages() {
        const errorMessages = document.querySelectorAll('.error-message');
        errorMessages.forEach(error => error.textContent = '');
    }

    function showError(input, message) {
        if (input) {
            const errorMessage = input.nextElementSibling; // Buscar el elemento siguiente al input para mostrar el mensaje
            if (errorMessage) {
                errorMessage.textContent = message;
            }
        }
    }
});

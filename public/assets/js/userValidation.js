document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('formUsuario');
    const submitButton = document.getElementById('crear-cuenta-btn-id');
    
    submitButton.addEventListener('click', function (event) {
        event.preventDefault();

        const nombre = document.querySelector('input[name="name"]');
        const contrasena = document.querySelector('input[name="contrasena"]');
        const rol_usuario = document.querySelector('select[name="rol_usuario"]');
        const email = document.querySelector('input[name="email"]');

        if (!nombre || !contrasena || !rol_usuario || !email) {
            console.error('Uno o más elementos del formulario no se encontraron.');
            return;
        }

        const nombreValue = nombre.value.trim();
        const contrasenaValue = contrasena.value.trim();
        const rolUsuarioValue = rol_usuario.value.trim();
        const emailValue = email.value.trim();

        // Validar campos vacíos
        if (nombreValue === '' || contrasenaValue === '' || emailValue === '' || rolUsuarioValue === '') {
            alert('Los campos no pueden estar vacíos.');
            return;
        }

        // Validar formato de correo electrónico
        const emailRegExp = /^[^\s@]+@gmail\.com$/;
        if (!emailRegExp.test(emailValue)) {
            alert('Por favor, introduce un correo electrónico de Gmail válido.');
            return;
        }

        // Validar longitud mínima de contraseña
        if (contrasenaValue.length < 8) {
            alert('La contraseña debe tener al menos 8 caracteres.');
            return;
        }

        // Validar que el nombre solo contenga letras
        const nombreRegExp = /^[A-Za-z]+$/;
        if (!nombreRegExp.test(nombreValue)) {
            alert('El nombre solo puede contener letras.');
            return;
        }

        // Verificar si el email ya existe en la base de datos
        fetch('/usuarios/check-email', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ email: emailValue })
        })
        .then(response => response.json())
        .then(data => {
            if (data.exists) {
                alert('El correo electrónico ya está registrado.');
            } else {
                // Si el email no existe, enviar el formulario
                form.submit();
            }
        })
        .catch(error => {
            console.error('Error al verificar el email:', error);
        });
    });

    // Alerta de modificación exitosa
    const urlParams = new URLSearchParams(window.location.search);
    const successParam = urlParams.get('success');
    if (successParam && successParam === 'true') {
        alert('¡Usuario modificado correctamente!');
    }
});

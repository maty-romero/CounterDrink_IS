document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('formUsuario');
    const submitButton = document.getElementById('crear-cuenta-btn-id');
    
    submitButton.addEventListener('click', function () {
        const nombre = document.querySelector('input[name="name"]').value.trim();
        const contrasena = document.querySelector('input[name="password"]').value.trim();
        const email = document.querySelector('input[name="email"]').value.trim();
        event.preventDefault(); 

        // Validar campos vacíos
        if (nombre === '' || contrasena === '' || email === '') {
            alert('Los campos no pueden estar vacíos.');
            return;
        }

        // Validar formato de correo electrónico
        const emailRegExp = /^[^\s@]+@gmail\.com$/;
        if (!emailRegExp.test(email)) {
            alert('Por favor, introduce un correo electrónico de Gmail válido.');
            return;
        }

        // Validar longitud mínima de contraseña
        if (contrasena.length < 8) {
            alert('La contraseña debe tener al menos 8 caracteres.');
            return;
        }

        // Si todas las validaciones pasan, enviar el formulario
        form.submit();
    });

     // Alerta de modificación exitosa
     const urlParams = new URLSearchParams(window.location.search);
     const successParam = urlParams.get('success');
     if (successParam && successParam === 'true') {
         alert('¡Usuario modificado correctamente!');
     }
 });



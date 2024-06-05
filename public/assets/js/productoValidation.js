document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form.user');
    const submitButton = document.getElementById('crear-cuenta-btn-id');

    submitButton.addEventListener('click', function (event) {
        event.preventDefault();  // Prevenir el envío automático del formulario

        const nombre = document.querySelector('input[name="name"]').value.trim();
        const stock = document.querySelector('input[name="stock"]').value.trim();
        const descripcion = document.querySelector('textarea[name="descripcion"]').value.trim();
        const precio = document.querySelector('input[name="precio"]').value.trim();
        const vol = document.querySelector('input[name="vol"]').value.trim();
        const tipo = document.querySelector('select[name="tipo"]').value.trim();
        const capacidad = document.querySelector('input[name="capacidad"]').value.trim();
        const marca = document.querySelector('input[name="marca"]').value.trim();

        // Validar campos vacíos
        if (!nombre || !stock || !descripcion || !precio || !vol || !tipo || !capacidad || !marca) {
            alert('Todos los campos son obligatorios.');
            return;
        }

        // Validar que solo haya números en los campos de número, con un punto decimal opcional pero correctamente colocado
        const numberRegExp = /^\d+(\.\d+)?$/;

        if (!numberRegExp.test(stock) || !numberRegExp.test(precio) || !numberRegExp.test(vol) || !numberRegExp.test(capacidad)) {
            alert('Stock, Precio, Vol% y Capacidad deben ser números válidos.');
            return;
        }

        // Validar valores no negativos
        if (parseFloat(stock) < 0 || parseFloat(precio) < 0 || parseFloat(vol) < 0 || parseFloat(capacidad) < 0) {
            alert('Los valores de Stock, Precio, Vol% y Capacidad no pueden ser negativos.');
            return;
        }

        // Si todas las validaciones pasan, enviar el formulario
        form.submit();
    });

    // Alerta de modificación exitosa
    const urlParams = new URLSearchParams(window.location.search);
    const successParam = urlParams.get('success');
    if (successParam && successParam === 'true') {
        alert('¡Producto modificado correctamente!');
    }
});

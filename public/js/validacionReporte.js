document.addEventListener('DOMContentLoaded', function () {
    const fechaDesdeInput = document.getElementById('id_fecha_desde');
    const fechaHastaInput = document.getElementById('id_fecha_hasta');
    const errorMessage = document.getElementById('error-message');
    const submitButton = document.getElementById('submitButton');
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    function validateDates() {
        const fechaDesde = fechaDesdeInput.value;
        const fechaHasta = fechaHastaInput.value;

        errorMessage.textContent = '';

        if (!fechaDesde || !fechaHasta) {
            errorMessage.textContent = 'Ambas fechas son obligatorias.';
            submitButton.disabled = true;
            return;
        }

        if (fechaDesde > fechaHasta) {
            errorMessage.textContent = 'La fecha "Desde" no puede ser posterior a la fecha "Hasta".';
            submitButton.disabled = true;
            return;
        }

        // validacion: existencia de ventas en el periodo ingresado
        fetch('/existeVentas', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN':  csrfToken // necesario para validar session
            },
            credentials: "same-origin",
            body: JSON.stringify({ fecha_desde: fechaDesde, fecha_hasta: fechaHasta })
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            if (data.success) {
                submitButton.disabled = false;
            } else {
                errorMessage.textContent = data.message;
                submitButton.disabled = true;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            errorMessage.textContent = 'Hubo un error al validar las fechas. Intente de nuevo.';
            submitButton.disabled = true;
        });
    }

    fechaDesdeInput.addEventListener('change', validateDates);
    fechaHastaInput.addEventListener('change', validateDates);
    submitButton.disabled = true;
});
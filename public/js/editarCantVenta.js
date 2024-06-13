document.addEventListener('DOMContentLoaded', function () {
    const btnFinalizarVenta = document.getElementById('btnFinalizar');
    const cantidades = document.querySelectorAll('.cantidad');
    const msgInfo = document.getElementById('msgInfo');
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    cantidades.forEach(input => {
        input.addEventListener('input', function () {
            const id = this.dataset.id;
            const cantidad = parseInt(this.value);

            fetch(`/ventas/actualizar/${id}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ cantidad: cantidad })
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                if (data.error) { 
                    btnFinalizarVenta.disabled = true;
                    msgInfo.innerHTML = `<div class="alert alert-danger">${data.error}</div>`;
                    return;
                }
                msgInfo.innerHTML = ''; 

                if (data.success) {
                    btnFinalizarVenta.disabled = false;
                    const precioTotalElement = document.getElementById(`precio-total-${id}`);
                    const formattedPrecioTotal = formatMoney(data.precio_total);
                    precioTotalElement.innerText = formattedPrecioTotal;
                    actualizarSubtotal(data.subtotal);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });

    function formatMoney(amount) {
        return '$' + amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
    }

    function actualizarSubtotal(subtotal) {
        const subtotalElement = document.querySelector('.d-flex.justify-content-end h4');
        if (subtotalElement) {
            const formattedSubtotal = subtotal ? formatMoney(subtotal) : '';
            subtotalElement.innerHTML = subtotal ? `<strong>Subtotal: ${formattedSubtotal}</strong>` : '&nbsp;';
        }
    }

});
var cambiosRealizados = [];

function mostrarError(mensaje) {
    var msgErrorDiv = document.getElementById('msgError');
    msgErrorDiv.innerText = mensaje;
    msgErrorDiv.classList.remove('d-none');
}

function agregarCambio(button) {
    var row = button.parentNode.parentNode.parentNode;
    var nroProducto = row.cells[0].innerText;
    var stockActual = parseInt(row.cells[3].innerText, 10);
    var stockIngresado = row.cells[4].firstChild.value;

    // Validar si el stock ingresado es 0
    if (stockIngresado == 0) {
        mostrarError('El stock ingresado no puede ser 0.');
        return;
    }

    // Validar si el stock ingresado es un número entero
    if (!/^-?[1-9]\d*$/.test(stockIngresado)) {
        mostrarError('Por favor ingrese un número entero para disminuir o aumentar el stock. Ejemplo: 10, -5, etc.');
        return;
    }

    stockIngresado = parseInt(stockIngresado, 10);

    // Validar si la suma del stock actual y el ingresado es menor que 0
    if (stockActual + stockIngresado < 0) {
        mostrarError('No se puede disminuir el stock por debajo de cero.');
        return;
    }

    var tbody = document.getElementById('cambios');
    var existingRow = tbody.querySelector('tr[data-producto="' + nroProducto + '"]');
    if (existingRow) {
        cambiosRealizados = cambiosRealizados.filter(cambio => cambio.nroProducto !== nroProducto);
        existingRow.remove();
    }

    var newRow = tbody.insertRow(-1);
    newRow.setAttribute('data-producto', nroProducto);
    var cell1 = newRow.insertCell(0);
    var cell2 = newRow.insertCell(1);
    var cell3 = newRow.insertCell(2);

    cell1.innerText = nroProducto;
    cell2.innerText = stockIngresado;
    cell3.innerHTML = '<button class="delete-btn"><i class="fas fa-trash-alt"></i></button>';

    var deleteBtn = cell3.querySelector('.delete-btn');
    deleteBtn.addEventListener('click', function(event) {
        var rowToDelete = event.target.closest('tr');
        var productoToDelete = rowToDelete.getAttribute('data-producto');
        cambiosRealizados = cambiosRealizados.filter(cambio => cambio.nroProducto !== productoToDelete);
        rowToDelete.parentNode.removeChild(rowToDelete);

        // Habilitar el botón de check correspondiente
        var tableRows = document.querySelectorAll('table tr');
        tableRows.forEach(function(tr) {
            if (tr.cells[0].innerText === productoToDelete) {
                var checkBtn = tr.querySelector('.btn-success');
                if (checkBtn) {
                    checkBtn.disabled = false;
                }
            }
        });
    });

    // Agregar el cambio al arreglo global
    cambiosRealizados.push({
        nroProducto: nroProducto,
        stockAlterado: stockIngresado
    });

    row.cells[4].firstChild.value = '';
    button.disabled = true; // Deshabilitar el botón de check
    document.getElementById('msgError').classList.add('d-none'); // Ocultar el mensaje de error si se añade un cambio correctamente
}

function enviarCambios() {
    if (cambiosRealizados.length === 0) {
        mostrarError('No hay datos para modificar.');
        return;
    }
    document.getElementById('inputCambios').value = JSON.stringify(cambiosRealizados);

    document.getElementById('formConfirmar').submit();
}

document.getElementById('confirmarBtn').addEventListener('click', function() {
    enviarCambios();
});

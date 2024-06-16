document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form.user');
    const submitButton = document.getElementById('crear-cuenta-btn-id');

    submitButton.addEventListener('click', function (event) {
        console.log('click');
        event.preventDefault();  // Prevenir el envío automático del formulario

        clearErrors();

        const nombre = document.querySelector('input[name="name"]').value.trim();
        const stock = document.querySelector('input[name="stock"]').value.trim();
        const descripcion = document.querySelector('textarea[name="descripcion"]').value.trim();
        const precio = document.querySelector('input[name="precio"]').value.trim();
        const vol = document.querySelector('input[name="vol"]').value.trim();
        const capacidad = document.querySelector('input[name="capacidad"]').value.trim();
        const marca = document.querySelector('input[name="marca"]').value.trim();
        const imagenInput = document.querySelector('input[name="imagen"]');
        const tipo = document.querySelector('select[name="tipo"]').value.trim();
        const isEditing = document.querySelector('input[name="is_editing"]').value;

        let isValid = true;

        if(isEditing === 'true'){
            const proveedor = document.querySelector('select[name="proveedor"]').value.trim();
            if (!proveedor) {
                showError('proveedor', 'Debe seleccionar un proveedor.');
                isValid = false;
            }
        }
            
        if (!tipo) {
            showError('tipo', 'Debe seleccionar un tipo de bebida.');
            isValid = false;
        }

        if (!nombre) {
            showError('name', 'El nombre es obligatorio.');
            isValid = false;
        }

        if (!/^\d+$/.test(stock)) {
            showError('stock', 'Stock debe ser un número entero válido.');
            isValid = false;
        }
        if (!stock) {
            showError('stock', 'El stock es obligatorio.');
            isValid = false;
        } else if (parseInt(stock) <= 0) {
            showError('stock', 'El stock debe ser mayor a 0.');
            isValid = false;
        }

        if (!descripcion) {
            showError('descripcion', 'La descripción es obligatoria.');
            isValid = false;
        }

        if (!/^\d+(\.\d+)?$/.test(precio)) {
            showError('precio', 'El precio debe ser un número válido.');
            isValid = false;
        }

        if (!precio) {
            showError('precio', 'El precio es obligatorio.');
            isValid = false;
        } else if (parseFloat(precio) <= 0) {
            showError('precio', 'El precio debe ser mayor a 0.');
            isValid = false;
        }
        if (!vol) {
            showError('vol', 'El porcentaje de alcohol es obligatorio.');
            isValid = false;
        } else if (!/^\d+(\.\d+)?$/.test(vol)) {
            showError('vol', 'El porcentaje de alcohol debe ser un número válido.');
            isValid = false;
        } else if (parseFloat(vol) < 0) {
            showError('vol', 'El porcentaje de alcohol no puede ser negativo.');
            isValid = false;
        }

        if (!/^\d+(\.\d+)?$/.test(capacidad)) {
            showError('capacidad', 'La capacidad debe ser un número válido.');
            isValid = false;
        }
        
        if (!capacidad) {
            showError('capacidad', 'La capacidad es obligatoria.');
            isValid = false;
        } else if (parseFloat(capacidad) <= 0) {
            showError('capacidad', 'La capacidad debe ser mayor a 0.');
            isValid = false;
        }

        if (!marca) {
            showError('marca', 'La marca es obligatoria.');
            isValid = false;
        }

        if(isEditing === 'true'){
            if (imagenInput.files.length == 0) {
                alert('Debe seleccionar una imagen.');
                console.log('entro');
                showError('imagen', 'Debe seleccionar una imagen.');
                isValid = false;
            }
        }


        if (isValid) {
            form.submit();
        }
    });

    function clearErrors() {
        document.querySelectorAll('.error-message').forEach(el => el.textContent = '');
    }

    function showError(inputName, message) {
        const input = document.querySelector(`[name="${inputName}"]`);
        if (input) {
            const errorMessage = input.closest('div').querySelector('.error-message');
            if (errorMessage) {
                errorMessage.textContent = message;
            }
        }
    }
});
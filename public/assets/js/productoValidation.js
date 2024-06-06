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
        const capacidad = document.querySelector('input[name="capacidad"]').value.trim();
        const marca = document.querySelector('input[name="marca"]').value.trim();
        const imagen = document.querySelector('input[name="imagen"]').value.trim();
        const isEditing = document.querySelector('input[name="is_editing"]').value;
       
        if (isEditing) {
            validateTipo();
        } else {
            validateProveedor();
            validateTipo();
        }

        function validateProveedor() {
            const proveedor = document.querySelector('select[name="proveedor"]').value.trim();
            if (proveedor === '0') {
                alert('Debe seleccionar un proveedor.');
                return;
            }else {
               alert(proveedor); 
            }
        }

        function validateTipo() {
            const tipo = document.querySelector('select[name="tipo"]').value.trim();
            if (!tipo) {
                alert('Debe ingresar un tipo de bebida.');
                return;
            }
            const nombreRegExp = /^[a-zA-Z\s]+$/;
            if (!nombreRegExp.test(tipo)) {
                alert('El tipo de bebida debe contener solo letras sin símbolos ni números.');
                return;
            }
        }

        // Validar que se haya ingresado una imagen solo si no está editando
        if (!isEditing && !imagen) {
            alert('Debe seleccionar una imagen.');
            return;
        }
        
        // Validar campos vacíos
        if (!nombre || !stock || !descripcion || !precio || !vol || !capacidad || !marca) {
            alert('Todos los campos son obligatorios.');
            return;
        }

        // Validar que solo haya números en los campos de número, con un punto decimal opcional pero correctamente colocado
        const numberRegExp = /^\d+$/;
        const decimalRegExp = /^\d+(\.\d+)?$/;

        if (!numberRegExp.test(stock) || !decimalRegExp.test(precio) || !decimalRegExp.test(vol) || !decimalRegExp.test(capacidad)) {
            alert('Stock debe ser un número entero válido. Precio, Vol% y Capacidad deben ser números válidos.');
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

document.addEventListener('DOMContentLoaded', (event) => {
    const confirmDeleteModal = document.getElementById('confirmDeleteModal');
    confirmDeleteModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget; // Botón que disparó el modal
        const deleteUrl = button.getAttribute('data-url'); // Extrae la URL de eliminación

        const confirmButton = confirmDeleteModal.querySelector('#confirmDeleteButton');

        // Remueve cualquier manejador previo para evitar duplicaciones
        confirmButton.removeEventListener('click', handleDelete);

        // Agrega un nuevo manejador de click
        confirmButton.addEventListener('click', handleDelete);

        function handleDelete() {
            // Crea un formulario y envíalo
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = deleteUrl;
            form.innerHTML = `
                <input type="hidden" name="_token" value="${document.querySelector('meta[name="csrf-token"]').getAttribute('content')}">
                <input type="hidden" name="_method" value="DELETE">
            `;
            document.body.appendChild(form);
            form.submit();
        }
    });
});

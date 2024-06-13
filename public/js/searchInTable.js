
// Es necesario que el id de la tabla referenciada = elementsTable

document.addEventListener('DOMContentLoaded', function() {
    var table = new simpleDatatables.DataTable("#elementsTable", {
        labels: {
            placeholder: "Buscar...", // El placeholder del input de búsqueda
            perPage: "{select} elementos por página", // La etiqueta del dropdown per-page
            noRows: "No se encontraron coincidencias con su búsqueda", // Mensaje mostrado cuando no hay registros
            info: "", // La etiqueta de información
            noResults: "No se encontraron coincidencias con su búsqueda" // Mensaje al no encontrar coincidencias
        },
        perPageSelect: false // Oculta el dropdown de per-page
    });
});
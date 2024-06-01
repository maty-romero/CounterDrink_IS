document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const productsContainer = document.getElementById('productsContainer');
    const searchResults = document.getElementById('searchResults');

    searchInput.addEventListener('input', function() {
        const query = searchInput.value;

        fetch(`/productos/search/cliente?query=${query}`)
            .then(response => response.text())
            .then(html => {
                productsContainer.innerHTML = html;

                if (query) {
                    searchResults.textContent = `Resultados de la búsqueda para "${query}"`;
                }else{
                    searchResults.textContent = '';
                }
                

            })
            .catch(error => console.error('Error:', error));

    });
});
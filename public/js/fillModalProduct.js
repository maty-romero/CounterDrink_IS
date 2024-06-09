document.addEventListener('DOMContentLoaded', function () {
    const viewProductButtons = document.querySelectorAll('.view-product');
    
    viewProductButtons.forEach(button => {
        button.addEventListener('click', function () {
            const product = JSON.parse(this.getAttribute('data-product'));

            document.getElementById('productImage').src = product.imagenURL;
            document.getElementById('productCode').innerText = `#CRZ-0${product.id}`;
            document.getElementById('productName').innerText = product.nombre_producto;
            document.getElementById('productPrice').innerText = `$${product.precio_producto}`;
            document.getElementById('productDescription').innerText = product.descripcion;
            document.getElementById('productType').innerText = product.tipo_bebida;
            document.getElementById('productBrand').innerText = product.marca;
            document.getElementById('productCapacity').innerText = Math.round(product.capacidad_ml);
            document.getElementById('productAlcohol').innerText = Math.round(product.contenido_alcohol);
        });
    });
});
@props(['id', 'imagenURL', 'nombreProducto', 'precioUnitario'])


<div class="col mb-5">
    <div class="card h-100">
        <!-- Sale badge-->
        <div class="badge bg-warning text-black position-absolute" style="top: 0.5rem; right: 0.5rem">En stock</div>
        <!-- Product image 450x300 -->
        <img class="card-img-top" src="{{ $imagenURL }}" width="450" height="250" alt="..." />
        <!-- Product details-->
        <div class="card-body p-4">
            <div class="text-center">
                <!-- Product name-->
                <h5 class="fw-bolder">{{ $nombreProducto }}</h5>
                <!-- Product price-->
                <span class="text-muted">${{ $precioUnitario }}</span>
            </div>
        </div>
        <!-- Product actions-->
        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
            <div class="text-center">
                <a class="btn btn-outline-dark mt-auto mb-3" href="{{ route('show_product', ['id' => $id]) }}">Ver producto</a>
            </div>
            <div class="text-center">
                <a class="btn btn-outline-dark mt-auto" href="#">Añadir al carrito</a>
            </div>
        </div>
    </div>
</div>

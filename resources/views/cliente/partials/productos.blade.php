@if($productos && $productos->count() > 0)

    @foreach ($productos as $producto)
        <x-cliente.itemCard 
            :id="$producto->id"
            :imagenURL="$producto->imagenURL"
            :nombreProducto="$producto->nombre_producto"
            :precioUnitario="$producto->precio_producto"
        />
    @endforeach

@else
    <div class="container">
        <h5 class='w-full bg-warning text-black font-bold text-2xl text-center p-1'>
            No se encontraron productos que coincidan con tu búsqueda.
        </h5>
    </div>
@endif

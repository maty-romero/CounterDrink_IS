@props(['id','imagenURL','tipoProducto', 'nombreProducto', 'cantidad', 'precioUnitario', 'precioTotal'])

<div class="row mb-4 d-flex justify-content-between align-items-center">
  <div class="col-md-2 col-lg-2 col-xl-2">
    <img src="{{ $imagenURL }}" width="80" height="110">
  </div>
  <div class="col-md-3 col-lg-3 col-xl-3">
    <h6 class="text-muted">{{ $tipoProducto }}</h6>
    <h6 class="text-black mb-0">{{ $nombreProducto }}</h6>
  </div>
  <div class="col-md-2">
    <form method='POST' action='{{ route('carrito_editar', ['id' => $id]) }}' class="d-flex align-items-center">
      @csrf
      @method('PATCH')
      <div class="container text-center">
        <div class="row">
          <button type='submit' name='decremento' class='rounded bg-white col align-self-center'>&minus;</button>
        </div>
        <div class="row">
          <input type='number' name='unidades' value='{{ $cantidad }}' readonly class='border-0 text-center col align-self-center p-1'>
        </div>
        <div class="row">
          <button type='submit' name='incremento' class='rounded bg-white col align-self-center'>&plus;</button>
        </div>
      </div>
  </form>
  </div>
  <div class="col-md-3 col-lg-3">
    <h6 class="mb-4">Precio unitario: @money($precioUnitario)</h6>
    <h6 class="mb-0">Precio total: @money($precioTotal)</h6>
  </div>
  <div class="col-md-1 col-lg-1 col-xl-1 text-end">
    <form method='POST' action='{{ route('carrito_eliminar', $id) }}'>
        @csrf
        @method('DELETE')
        <button type="submit" class="text-danger btn btn-dark"><i class="bi bi-trash"></i></button>
    </form>
  </div>
</div>
<hr class="my-4">

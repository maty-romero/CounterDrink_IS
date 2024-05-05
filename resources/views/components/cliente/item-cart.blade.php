@props(['imagenURL','tipoProducto', 'nombreProducto', 'cantidad', 'precioUnitario', 'precioTotal'])

<div class="row mb-4 d-flex justify-content-between align-items-center">
  <div class="col-md-2 col-lg-2 col-xl-2">
    <img src="{{ $imagenURL }}" width="80" height="110">
  </div>
  <div class="col-md-3 col-lg-3 col-xl-3">
    <h6 class="text-muted">{{$tipoProducto}}</h6>
    <h6 class="text-black mb-0">{{$nombreProducto}}</h6>
  </div>
  <div class="col-md-2 col-lg-2 col-xl-2">
    <input id="form1" min="0" name="quantity" value="{{$cantidad}}" type="number" class="form-control form-control-sm" />
  </div>
  <div class="col-md-3 col-lg-3">
    <h6 class="mb-4">Precio unitario: ${{$precioUnitario}}</h6>
    <h6 class="mb-0">Precio total: ${{$precioTotal}}</h6>
  </div>
  <div class="col-md-1 col-lg-1 col-xl-1 text-end">
    <a href="#" class="text-danger btn btn-dark"><i class="bi bi-trash"></i></a>
  </div>
</div>
<hr class="my-4">

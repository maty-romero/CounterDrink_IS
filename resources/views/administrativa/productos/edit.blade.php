@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4" style="text-align: center; margin-bottom: 50px;">Modificar producto</h1>
        <div class="form-container">
            <div class="form-card">
                <form class="user" id="formUsuario" method="POST" action="{{ route('producto_update', $producto->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label class="col-form-label" for="name">Nombre:</label>
                            <input class="form-control form-control-user" type="text" placeholder="Nombre" required name="name" value="{{ $producto->nombre_producto }}">
                        </div>
                        <div class="col-sm-6">
                            <label class="col-form-label" for="stock">Stock:</label>
                            <input class="form-control form-control-user" type="number" placeholder="stock" required name="stock" value="{{ $producto->stock }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label" for="descripcion">Descripcion:</label>
                        <textarea class="form-control form-control-user assistant-hide" placeholder="descripcion" id="descripcion-id" required name="descripcion">{{ $producto->descripcion }}</textarea>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label class="col-form-label" for="precio">Precio:</label>
                            <input class="form-control form-control-user" type="number" placeholder="Precio" id="precio-id" required name="precio" value="{{ $producto->precio_producto }}">
                        </div>
                        <div class="col-sm-6">
                            <label class="col-form-label" for="vol">Vol%:</label>
                            <input class="form-control form-control-user" type="number" placeholder="vol%" required name="vol" value="{{ $producto->contenido_alcohol }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label class="col-form-label" for="Tipo">Tipo de bebida:</label>
                            <input class="form-control form-control-user" type="text" id="Tipo-id" placeholder="Tipo de bebida" required name="tipo" value="{{ $producto->tipo_bebida }}">
                        </div>
                        <div class="col-sm-6">
                            <label class="col-form-label" for="Capacidad">Capacidad (Lts):</label>
                            <input class="form-control form-control-user" type="number" placeholder="Capacidad" required name="capacidad" value="{{ $producto->capacidad_ml }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label" for="Marca">Marca:</label>
                        <input class="form-control form-control-user assistant-hide" type="text" placeholder="Marca" id="Marca-id" required name="marca" value="{{ $producto->marca }}">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label" for="image">Imagen del producto:</label>
                        <input class="form-control form-control-user" type="file" id="image-id" name="image">
                        @if($producto->imagen)
                            <div class="mt-2">
                                <img src="{{ $producto->imagen }}" alt="Imagen del producto" style="max-width: 200px;">
                            </div>
                        @endif
                    </div>
                    <button class="btn btn-primary d-block btn-user w-100" id="crear-cuenta-btn-id" type="button">Modificar datos</button>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('/assets/js/productoValidation.js') }}"></script>
@endsection

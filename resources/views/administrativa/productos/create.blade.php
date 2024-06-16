@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4" style="text-align: center; margin-bottom: 50px;">Agregar producto</h1>
        <div class="form-container">
            <div class="form-card">
                <form id="formProducto" class="user" method="POST" action="{{ route('productos_store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="is_editing" value="true">
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label class="col-form-label" for="name">Nombre:</label>
                            <input class="form-control form-control-user" type="text" placeholder="Nombre" required="true" name="name" value="{{ old('name') }}" title="">
                            <div class="error-message text-danger"></div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-form-label" for="stock">Stock:</label>
                            <input class="form-control form-control-user" type="number" placeholder="stock" required="true" name="stock" value="{{ old('stock') }}" title="">
                            <div class="error-message text-danger"></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label" for="descripcion">Descripcion:</label>
                        <textarea style="resize: none" class="form-control form-control-user assistant-hide" placeholder="descripcion" id="descripcion-id" required="true" name="descripcion" title="">{{ old('descripcion') }}</textarea>
                        <div class="error-message text-danger"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label class="col-form-label" for="precio">Precio:</label>
                            <input class="form-control form-control-user" type="number" placeholder="Precio" id="precio-id" required="true" name="precio" value="{{ old('precio') }}" title="">
                            <div class="error-message text-danger"></div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-form-label" for="vol">Porcentaje de alcholl (%):</label>
                            <input class="form-control form-control-user" type="number" placeholder="vol%" required="true" name="vol" value="{{ old('vol') }}" title="">
                            <div class="error-message text-danger"></div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label class="col-form-label" for="tipo">Tipo de bebida:</label>
                            <select class="form-control form-control-user" name="tipo" required="true">
                                <option value="" selected disabled>Seleccione tipo bebida</option>
                                <option value="cerveza">Cerveza</option>
                                <option value="vodka">Vodka</option>
                                <option value="whisky">Whisky</option>
                                <option value="vino">Vino</option>
                            </select>
                            <div class="error-message text-danger"></div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-form-label" for="capacidad">Capacidad (ml):</label>
                            <input class="form-control form-control-user" type="number" placeholder="Capacidad" required="true" name="capacidad" value="{{ old('capacidad') }}" title="">
                            <div class="error-message text-danger"></div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label class="col-form-label" for="marca">Marca:</label>
                            <input class="form-control form-control-user assistant-hide" type="text" placeholder="Marca" id="marca-id" required="true" name="marca" value="{{ old('marca') }}" title="">
                            <div class="error-message text-danger"></div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-form-label" for="proveedor">Proveedor:</label>
                            <select class="form-control form-control-user" name="proveedor" required>
                                <option value="" selected disabled>Seleccione proveedor</option>
                                @foreach ($proveedores as $proveedor)
                                    <option value="{{ $proveedor->id }}">{{ $proveedor->nombre_proveedor }}</option>
                                @endforeach
                            </select>
                            <div class="error-message text-danger"></div>
                        </div>
                    </div>    
                    <div class="mb-3">
                        <label class="col-form-label" for="imagen">Imagen del producto:</label>
                        <input class="form-control form-control-user" type="file" id="imagen-id" name="imagen" accept="image/*" title="">
                        <div class="error-message text-danger"></div>
                    </div>
                    <button class="btn btn-primary d-block btn-user w-100" id="crear-cuenta-btn-id" type="button">Agregar producto</button>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/productoValidation.js') }}"></script>
@endsection

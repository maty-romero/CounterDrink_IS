@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4" style="text-align: center; margin-bottom: 50px;">Agregar producto</h1>
        <div class="form-container">
            <div class="form-card">
                <form class="user">
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label class="col-form-label" for="name">Nombre:</label>
                            <input class="form-control form-control-user" type="text" placeholder="Nombre" required="true" name="name" value="" title="">
                        </div>
                        <div class="col-sm-6">
                            <label class="col-form-label" for="stock">Stock:</label>
                            <input class="form-control form-control-user" type="number" placeholder="stock" required="true" name="stock" value="" title="">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label" for="email">Descripcion:</label>
                        <textarea class="form-control form-control-user assistant-hide" placeholder="descripcion" id="descripcion-id" required="true" name="descripcion" title=""></textarea>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label class="col-form-label" for="precio">Precio:</label>
                            <input class="form-control form-control-user" type="number" placeholder="Precio" id="precio-id" required="true" name="precio" value="" title="">
                        </div>
                        <div class="col-sm-6">
                            <label class="col-form-label" for="vol%">vol%:</label>
                            <input class="form-control form-control-user" type="number" placeholder="vol%" required="true" name="vol%" value="" title="">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label class="col-form-label" for="Tipo">Tipo de bebida:</label>
                            <input class="form-control form-control-user" type="text" id="Tipo-id" placeholder="Tipo de bebida" required="true" name="precio" value="" title="">
                        </div>
                        <div class="col-sm-6">
                            <label class="col-form-label" for="Capacidad">Capacidad (Lts):</label>
                            <input class="form-control form-control-user" type="number" placeholder="Capacidad" required="true" name="Capacidad" value="" title="">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label" for="Marca">Marca:</label>
                        <input class="form-control form-control-user assistant-hide" type="text" placeholder="Marca" id="Marca-id" required="true" name="Marca" value="" title="">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label" for="image">Imagen del producto:</label>
                        <input class="form-control form-control-user" type="file" id="image-id" name="image" title="">
                    </div>
                    <button class="btn btn-primary d-block btn-user w-100" id="crear-cuenta-btn-id" type="submit">Agregar producto</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4" style="text-align: center; margin-bottom: 50px;">Modificar usuario</h1>
    <div class="form-container">
        <div class="form-card">
            <form id="formUsuario" class="user" method="POST" action="{{ route('usuarios_update', $usuario->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-sm-6">
                        <label class="col-form-label" for="name">Nombre:</label>
                        <input class="form-control form-control-user" type="text" placeholder="Nombre" required name="name" value="{{ $usuario->name }}" title="">
                        <div class="error-message text-danger"></div> 
                    </div>
                    <div class="col-sm-6">
                        <label class="col-form-label" for="contrasena">Contraseña:</label>
                        <input class="form-control form-control-user" type="password" id="contrasena-id" placeholder="Contraseña" required name="contrasena" value="{{ $usuario->password }}" title="">
                        <div class="error-message text-danger"></div> 
                    </div>
                </div>

                <div class="mb-3">
                    <label class="col-form-label" for="email">Email:</label>
                    <input class="form-control form-control-user" type="email" id="email-id" required name="email" value="{{ $usuario->email }}" title="">
                    <div class="error-message text-danger"></div> 
                </div>
                <button class="btn btn-primary d-block btn-user w-100" id="crear-cuenta-btn-id" type="button">Modificar datos</button>
            </form>
        </div>
    </div>
</div>
<script src="{{ asset('/assets/js/userValidation.js') }}"></script>
@endsection

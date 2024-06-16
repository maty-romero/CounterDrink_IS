@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4" style="text-align: center; margin-bottom: 50px;">Registrar usuario</h1>
    <div class="form-container">
        <div class="form-card">
            <form id="formUsuario" class="user" method="POST" action="{{ route('usuarios_store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-sm-6">
                        <label class="col-form-label" for="name">Nombre de usuario:</label>
                        <input class="form-control form-control-user" type="text" placeholder="Nombre" required name="name" value="{{ old('name') }}" title="">
                        <div class="error-message text-danger"></div>
                    </div>
                    <div class="col-sm-6">
                        <label class="col-form-label" for="rol_usuario">Tipo de usuario:</label>
                        <select class="form-control form-control-user" name="rol_usuario" required>
                            <option value="">Seleccione tipo de usuario</option>
                            <option value="abastecedor" {{ old('rol_usuario') == 'abastecedor' ? 'selected' : '' }}>Abastecedor</option>
                            <option value="cajero" {{ old('rol_usuario') == 'cajero' ? 'selected' : '' }}>Cajero</option>
                        </select>
                        <div class="error-message text-danger"></div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="col-form-label" for="contrasena">Contraseña:</label>
                    <input class="form-control form-control-user" type="password" id="contrasena-id" placeholder="Contraseña" required name="contrasena" value="{{ old('contrasena') }}" title="">
                    <div class="error-message text-danger"></div>
                </div>

                <div class="mb-3">
                    <label class="col-form-label" for="email">Email:</label>
                    <input class="form-control form-control-user" type="email" id="email-id" required name="email" value="{{ old('email') }}" title="" >
                    <div class="error-message text-danger"></div>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button class="btn btn-primary d-block btn-user w-100" id="crear-cuenta-btn-id" type="button">Registrar empleado</button>
            </form>
        </div>
    </div>
</div>
<script src="{{ asset('assets/js/userValidation.js') }}"></script>
@endsection

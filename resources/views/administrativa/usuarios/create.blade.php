@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4" style="text-align: center; margin-bottom: 50px;">Registrar usuario</h1>
        <div class="form-container">
            <div class="form-card">
                <form id="formUsuario" class="user" method="POST" action="{{ route('usuarios_store') }}">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label class="col-form-label" for="name">Nombre de usuario:</label>
                            <input class="form-control form-control-user" type="text" placeholder="Nombre" required="true" name="name" value="{{ old('name') }}" title="">
                        </div>
                        <div class="col-sm-6">
                            <label class="col-form-label" for="rol_usuario">Tipo de usuario:</label>
                            <select class="form-control form-control-user" name="rol_usuario" required="true">
                                <option value="abastecedor">Abastecedor</option>
                                <option value="cajero">Cajero</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label" for="contrasena">Contraseña:</label>
                        <input class="form-control form-control-user" type="password" id="contrasena-id" placeholder="Contraseña" required="true" name="contrasena" value="" title="">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label" for="email">Email:</label>
                        <input class="form-control form-control-user assistant-hide" type="email" id="email-id" required="true" name="email" value="{{ old('email') }}" title="">
                    </div>
                    <button class="btn btn-primary d-block btn-user w-100" id="crear-cuenta-btn-id" type="submit">Registrar empleado</button>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/userValidation.js') }}"></script>
@endsection

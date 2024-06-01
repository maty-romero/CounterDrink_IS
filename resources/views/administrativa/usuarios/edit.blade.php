@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4" style="text-align: center; margin-bottom: 50px;">Modificar usuario</h1>
    <div class="form-container">
        <div class="form-card">
            <form class="user">
                <div class="row mb-3">
                    <div class="col-sm-6">
                        <label class="col-form-label" for="name">Nombre:</label>
                        <input class="form-control form-control-user" type="text" placeholder="Nombre" required="true" name="name" value="" title="">
                    </div>
                    <div class="col-sm-6">
                        <label class="col-form-label" for="contrasena">Contraseña:</label>
                        <input class="form-control form-control-user" type="password" id="contrasena-id" placeholder="Contraseña" required="true" name="contrasena" value="" title="">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="col-form-label" for="email">Email:</label>
                    <input class="form-control form-control-user assistant-hide" type="email" id="email-id" required="true" name="email" value="" title="">
                </div>
                <button class="btn btn-primary d-block btn-user w-100" id="crear-cuenta-btn-id" type="submit">Modificar datos</button>
            </form>
        </div>
    </div>
</div>
@endsection
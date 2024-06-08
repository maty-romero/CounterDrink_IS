@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4" style="text-align: center; margin-bottom: 50px;">Editar proveedor</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="form-container">
            <div class="form-card">
                <form class="user" action="{{ route('proveedores_update', $proveedor->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="col-form-label" for="name">Nombre:</label>
                        <input class="form-control form-control-user" required type="text" placeholder="Nombre" required="true" name="name" value="{{ old('name', $proveedor->nombre_proveedor) }}" title="">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label class="col-form-label" for="dni">CUIT:</label>
                            <input class="form-control form-control-user" required type="number" id="dni-id" placeholder="CUIT" required="true" name="cuit" value="{{ old('cuit', $proveedor->cuit) }}" title="">
                            @error('cuit')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label class="col-form-label" for="phoneNumber">Teléfono:</label>
                            <input class="form-control form-control-user" required type="text" placeholder="Teléfono" required="true" name="telefono" value="{{ old('telefono', $proveedor->nro_telefono) }}" title="">
                            @error('telefono')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label" for="email">Email:</label>
                        <input class="form-control form-control-user assistant-hide" required type="email" id="email-id" required="true" name="email" value="{{ old('email', $proveedor->email) }}" title="">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="btn btn-primary d-block btn-user w-100" id="crear-cuenta-btn-id" type="submit">Actualizar proveedor</button>
                </form>
            </div>
        </div>
    </div>
@endsection

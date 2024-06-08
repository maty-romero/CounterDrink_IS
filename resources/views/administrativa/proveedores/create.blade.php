@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4" style="text-align: center;">Registrar proveedor</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="form-container">
        <div class="form-card">
            <form class="user" action="{{ route('proveedores_store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="col-form-label" for="name">Nombre:</label>
                    <input class="form-control form-control-user" required type="text" placeholder="Nombre" name="name" value="{{ old('name') }}" title="">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="row mb-3">
                    <div class="col-sm-6">
                        <label class="col-form-label" for="dni">CUIT:</label>
                        <input class="form-control form-control-user" required type="number" id="dni-id" placeholder="CUIT" name="cuit" value="{{ old('cuit') }}" title="">
                        @error('cuit')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <label class="col-form-label" for="phoneNumber">Teléfono:</label>
                        <input class="form-control form-control-user" required type="text" placeholder="Teléfono" name="telefono" value="{{ old('telefono') }}" title="">
                        @error('telefono')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="col-form-label" for="email">Email:</label>
                    <input class="form-control form-control-user assistant-hide" required type="email" id="email-id" name="email" value="{{ old('email') }}" title="">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button class="btn btn-primary d-block btn-user w-100" id="crear-cuenta-btn-id" type="submit">Registrar proveedor</button>
            </form>
        </div>
    </div>
</div>
@endsection

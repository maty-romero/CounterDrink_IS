@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4" style="text-align: center; margin-bottom: 50px;">Proveedores</h1>
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <i class="fas fa-table me-1"></i>
                    Proveedores
                </div>
                <div>
                    <a class="btn btn-primary" href="{{ route('proveedores_create') }}">Agregar Nuevo</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Cuit</th>
                            <th>Telefono</th>
                            <th>Email</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($proveedores as $proveedor)
                            <tr>
                                <td>{{ $proveedor['nombre_proveedor'] }}</td>
                                <td>{{ $proveedor['cuit'] }}</td>
                                <td>{{ $proveedor['nro_telefono'] }}</td>
                                <td>{{ $proveedor['email'] }}</td>
                                <td class="action-buttons">
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('proveedores_edit', $proveedor->id) }}" class="btn btn-warning edit-btn me-2">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('proveedores_destroy', $proveedor->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button  type="submit" class="btn btn-danger delete-btn ms-2"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Enlaces de paginación -->
                <div class="d-flex justify-content-center">
                    {{ $proveedores->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

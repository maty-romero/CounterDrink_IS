@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4" style="text-align: center; margin-bottom: 50px;">Proveedores</h1>
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <i class="fas fa-table me-1"></i>
                    Tabla de Proveedores
                </div>
                <div>
                    <a class="btn btn-primary" href="{{ route('proveedores_create') }}">Agregar Nuevo</a>
                </div>
            </div>
            </div>
            <div class="card-body">
                <x-tabla :columna="['Nombre','Cuit','Telefono','Email','Accion']">
                    @foreach($proveedores as $proveedor)
                        <tr>
                            <td>{{ $proveedor['nombre_proveedor'] }}</td>
                            <td>{{ $proveedor['cuit'] }}</td>
                            <td>{{ $proveedor['nro_telefono'] }}</td>
                            <td>{{ $proveedor['email'] }}</td>
                            <td class="action-buttons">
                                <div class="d-flex justify-content-center">
                                    <button class="edit-btn me-2"><i class="fas fa-edit"></i></button>
                                    <button class="delete-btn ms-2"><i class="fas fa-trash-alt"></i></button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </x-tabla>
            </div>
        </div>
    </div>
@endsection
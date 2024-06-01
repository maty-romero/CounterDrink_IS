@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4" style="text-align: center; margin-bottom: 50px;">Productos</h1>
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <i class="fas fa-table me-1"></i>
                    Tabla de productos
                </div>
                <div>
                    <a class="btn btn-primary" href="{{ route('productos_create') }}">Agregar Nuevo</a>
                </div>
            </div>
            <div class="card-body">
                <x-tabla columna="Nro Producto,Nombre,Marca,Stock,Precio,capacidad en (Lts),Descripcion,Accion">
                    @foreach($productos as $producto)
                        <tr>
                            <td>{{ $producto['Nro Producto'] }}</td>
                            <td>{{ $producto['Nombre'] }}</td>
                            <td>{{ $producto['Marca'] }}</td>
                            <td>{{ $producto['Stock'] }}</td>
                            <td>{{ $producto['Precio'] }}</td>
                            <td>{{ $producto['capacidad en (Lts)'] }}</td>
                            <td>{{ $producto['Descripcion'] }}</td>
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
    </div>
@endsection

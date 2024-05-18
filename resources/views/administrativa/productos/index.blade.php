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
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregarNuevoModal">Agregar Nuevo</button>
                </div>
            </div>
            <div class="card-body">
                <x-tabla :columna="Nro Producto,Nombre,Marca,Stock,Precio,capacidad en (Lts),Descripcion,Accion">
                    @php
                        $productos = [
                            ['id' => 1, 'nombre' => 'Producto 1', 'marca' => 'Marca 1', 'stock' => 10, 'precio' => 20.50, 'capacidad' => '500ml', 'descripcion' => 'Descripción 1'],
                            ['id' => 2, 'nombre' => 'Producto 2', 'marca' => 'Marca 2', 'stock' => 5, 'precio' => 15.75, 'capacidad' => '1L', 'descripcion' => 'Descripción 2'],
                            ['id' => 3, 'nombre' => 'Producto 3', 'marca' => 'Marca 3', 'stock' => 8, 'precio' => 30.00, 'capacidad' => '750ml', 'descripcion' => 'Descripción 3'],
                            ['id' => 4, 'nombre' => 'Producto 4', 'marca' => 'Marca 4', 'stock' => 3, 'precio' => 25.25, 'capacidad' => '1.5L', 'descripcion' => 'Descripción 4'],
                            ['id' => 5, 'nombre' => 'Producto 5', 'marca' => 'Marca 5', 'stock' => 12, 'precio' => 18.90, 'capacidad' => '330ml', 'descripcion' => 'Descripción 5'],
                        ];
                    @endphp
                    @foreach($productos as $producto)
                        <tr>
                            <td>{{ $producto['id'] }}</td>
                            <td>{{ $producto['nombre'] }}</td>
                            <td>{{ $producto['marca'] }}</td>
                            <td>{{ $producto['stock'] }}</td>
                            <td>{{ $producto['precio'] }}</td>
                            <td>{{ $producto['capacidad'] }}</td>
                            <td>{{ $producto['descripcion'] }}</td>
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

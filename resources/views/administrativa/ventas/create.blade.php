@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4 mb-3" style="text-align: center;">Registrar una venta</h1>
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <i class="fas fa-table me-1"></i>
                    Productos
                </div>
            </div>
            <div class="card-body text-center">
                <x-tabla :columna="Nro Producto,Nombre,Marca,Stock,Precio,capacidad en (Lts),Accion">
                    @php
                        $productos = [
                            ['id' => 1, 'nombre' => 'Producto 1', 'marca' => 'Marca 1', 'stock' => 10, 'precio' => 20.50, 'capacidad' => '500ml'],
                            ['id' => 2, 'nombre' => 'Producto 2', 'marca' => 'Marca 2', 'stock' => 5, 'precio' => 15.75, 'capacidad' => '1L'],
                            ['id' => 3, 'nombre' => 'Producto 3', 'marca' => 'Marca 3', 'stock' => 8, 'precio' => 30.00, 'capacidad' => '750ml'],
                            ['id' => 4, 'nombre' => 'Producto 4', 'marca' => 'Marca 4', 'stock' => 3, 'precio' => 25.25, 'capacidad' => '1.5L'],
                            ['id' => 5, 'nombre' => 'Producto 5', 'marca' => 'Marca 5', 'stock' => 12, 'precio' => 18.90, 'capacidad' => '330ml'],
                        ];
                    @endphp
                    @foreach($productos as $producto)
                        <tr class="text-center">
                            <td>{{ $producto['id'] }}</td>
                            <td>{{ $producto['nombre'] }}</td>
                            <td>{{ $producto['marca'] }}</td>
                            <td>{{ $producto['stock'] }}</td>
                            <td>{{ $producto['precio'] }}</td>
                            <td>{{ $producto['capacidad'] }}</td>
                            <td class="action-buttons">
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-warning ms-2"><i class="fas fa-eye"></i></button>
                                    <span class="mx-2"></span>
                                    <button class="btn btn-success"><i class="fas fa-check"></i></button>
                                </div>
                            </td>    
                        </tr>
                    @endforeach
                </x-tabla>
            </div>
        </div>
    </div>
@endsection
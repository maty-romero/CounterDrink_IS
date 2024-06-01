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
                <x-tabla columna="Nro Producto,Nombre,Marca,Stock,Precio,Accion">
                    @foreach($productos as $producto)
                        <tr>
                            <td>{{ $producto['Nro Producto'] }}</td>
                            <td>{{ $producto['Nombre'] }}</td>
                            <td>{{ $producto['Marca'] }}</td>
                            <td>{{ $producto['Stock'] }}</td>
                            <td>{{ $producto['Precio'] }}</td>
                            <td class="action-buttons">
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('productos_edit', $producto['Nro Producto']) }}" style="color: black; border: 2px solid black; width:26px; height: 26px; class=edit-btn me-2"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('productos_destroy', $producto['Nro Producto']) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-btn ms-2"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                    <a href="{{ route('productos_show', $producto['Nro Producto']) }}" class="details-btn ms-2" style="color: blue; border: 2px solid blue; width: 26px; height: 26px;"><i class="fas fa-info-circle"></i></a>
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

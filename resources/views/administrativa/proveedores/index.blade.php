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
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregarNuevoModal">Agregar Nuevo</button>
                </div>
            </div>
            <div class="card-body">
                <x-tabla :columna="Nro Proveedor,Nombre,Cuit,Telefono,Email,Accion">
                    @php
                    $proveedores = [
                        ['id' => 1, 'nombre' => 'Proveedor 1', 'cuit' => '123456789', 'telefono' => '1234567890', 'email' => 'proveedor1@example.com'],
                        ['id' => 2, 'nombre' => 'Proveedor 2', 'cuit' => '987654321', 'telefono' => '0987654321', 'email' => 'proveedor2@example.com'],
                        ['id' => 3, 'nombre' => 'Proveedor 3', 'cuit' => '456789123', 'telefono' => '4567891230', 'email' => 'proveedor3@example.com'],
                        ['id' => 4, 'nombre' => 'Distribuidora de Vinos', 'cuit' => '30-24681012-1', 'telefono' => '+541199876543', 'email' => 'info@distribuidoravinos.com'],
                        ['id' => 5, 'nombre' => 'Destilería Los Andes', 'cuit' => '30-13579246-3', 'telefono' => '+541188765432', 'email' => 'ventas@destileriandes.com'],
                        ['id' => 6, 'nombre' => 'Importadora de Bebidas Exóticas', 'cuit' => '30-36925814-5', 'telefono' => '+541177777777', 'email' => 'info@importadorabebidas.com'],
                    ];
                    @endphp

                    @foreach($proveedores as $proveedor)
                        <tr>
                            <td>{{ $proveedor['id'] }}</td>
                            <td>{{ $proveedor['nombre'] }}</td>
                            <td>{{ $proveedor['cuit'] }}</td>
                            <td>{{ $proveedor['telefono'] }}</td>
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
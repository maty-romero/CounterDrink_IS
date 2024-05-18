@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4" style="text-align: center; margin-bottom: 50px;">Usuarios</h1>
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <i class="fas fa-table me-1"></i>
                    Tabla de usuarios
                </div>
                <div>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregarNuevoModal">Agregar Nuevo</button>
                </div>
            </div>
            <div class="card-body">
                <x-tabla columna="Nombre,Rol,Email,Accion">
                    @php
                        $usuarios = [
                            ['nombre' => 'John Doe', 'rol' => 'Admin', 'email' => 'johndoe@example.com'],
                            ['nombre' => 'Jane Smith', 'rol' => 'User', 'email' => 'janesmith@example.com'],
                            ['nombre' => 'Mike Johnson', 'rol' => 'User', 'email' => 'mikejohnson@example.com'],
                        ];
                    @endphp
                    @foreach($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario['nombre'] }}</td>
                            <td>{{ $usuario['rol'] }}</td>
                            <td>{{ $usuario['email'] }}</td>
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
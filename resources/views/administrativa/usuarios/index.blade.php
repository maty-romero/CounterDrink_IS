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
                    <a class="btn btn-primary" href="{{ route('usuarios_create') }}">Agregar Nuevo</a>
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
                                    <a class="btn btn-primary edit-btn me-2" href="{{ route('usuarios_edit', ['id' => $usuario['id']]) }}"><i class="fas fa-edit"></i></a>
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
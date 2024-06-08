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
                    @foreach($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario['name'] }}</td>
                            <td>{{ $usuario['rol_usuario'] }}</td>
                            <td>{{ $usuario['email'] }}</td>
                            <td class="action-buttons">
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('usuarios_edit', $usuario['id']) }}" style="color: black; border: 2px solid black; width:26px; height: 26px; class=edit-btn me-2"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('usuarios_destroy', $usuario['id']) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-btn ms-2"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                            </td>
                        </tr>
                    @endforeach
                </x-tabla>
            </div>
        </div>
    </div>
@endsection

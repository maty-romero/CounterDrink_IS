@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4" style="text-align: center; margin-bottom: 50px;">Usuarios</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

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
                <table id="elementsTable" class="table text-center">
                    <thead>
                        <tr>
                            <th>Nombre de usuario</th>
                            <th>Rol</th>
                            <th>Email</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                            <tr>
                                <td>{{ $usuario->name }}</td>
                                <td>{{ $usuario->rol_usuario }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td class="action-buttons">
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('usuarios_edit', $usuario->id) }}"
                                            class="btn btn-warning ms-2 edit-btn">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-danger ms-2 delete-btn"
                                            data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"
                                            data-url="{{ route('usuarios_destroy', $usuario->id) }}">
                                            <i class="fas fa-trash-alt text-white"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Enlaces de paginación -->
                <div class="d-flex justify-content-center">
                    {{ $usuarios->links() }}
                </div>
            </div>
        </div>
    </div>

    {{-- Scripts --}}  
    <script src="{{asset('js/searchInTable.js')}}"></script>
@endsection

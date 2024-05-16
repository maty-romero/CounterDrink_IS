@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4" style="text-align: center; margin-bottom: 50px;">Ventas</h1>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            <div>
                <i class="fas fa-table me-1"></i>
                Tabla de ventas
            </div>
            <div>
                <a class="btn btn-primary" href="{{ route('ventas_create') }}">Registrar nueva venta</a>
                {{-- 
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregarNuevoModal"></button>
                --}}
            </div>
        </div>
        <div class="card-body">

            <x-tabla columna="Nro Pago,Fecha venta,Monto Final,Accion">
                @php
                    $ventas = [
                                ['id' => 1, 'fecha_venta' => '2024-05-01', 'monto_final' => 150.50],
                                ['id' => 2, 'fecha_venta' => '2024-05-02', 'monto_final' => 210.75],
                                ['id' => 3, 'fecha_venta' => '2024-05-03', 'monto_final' => 180.00],
                                ['id' => 4, 'fecha_venta' => '2024-05-04', 'monto_final' => 300.25],
                                ['id' => 5, 'fecha_venta' => '2024-05-05', 'monto_final' => 250.90],
                                ];
                @endphp
                @foreach($ventas as $venta)
                <tr>
                    <td>{{ $venta['id'] }}</td>
                    <td>{{ $venta['fecha_venta'] }}</td>
                    <td>{{ $venta['monto_final'] }}</td>
                    <td class="action-buttons">
                        <div class="d-flex justify-content-center">
                            <button class="edit-btn"><i class="fas fa-edit"></i></button>
                            <button class="delete-btn"><i class="fas fa-trash-alt"></i></button>
                        </div>
                    </td>
                </tr>
            @endforeach
            
            </x-tabla>
        </div>
    </div>
</div>    
@endsection

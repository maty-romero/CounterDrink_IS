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
            @if (Auth::user()->rol_usuario == 'administrador' || Auth::user()->rol_usuario == 'abastecedor')
                <div>
                    <a class="btn btn-primary" href="{{ route('ventas_create') }}">Registrar nueva venta</a>
                </div>
            @endif
        </div>

        <div class="card-body">
            @if (empty($ventas) || count($ventas) == 0)
                <div class="container mx-auto flex flex-wrap mb-1 overflow-hidden">
                    <h5 class='w-full bg-warning text-black font-bold text-2xl text-center p-5'>
                    No hay ventas realizadas hasta el momento.
                    </h5>
                </div>    
            @else
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>Nro Venta</th>
                            <th>Nro pago</th>
                            <th>Fecha Venta</th>
                            <th>Monto Final</th>
                            <th>Obtener comprobante</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ventas as $venta)
                        <tr>
                            <td>{{ $venta->id }}</td>
                            <td>{{ $venta->nro_pago }}</td>
                            <td>{{ date('d-m-Y', strtotime($venta->fecha_venta)) }}</td>
                            <td>@money($venta->monto_final_venta)</td>
                            <td class="action-buttons">
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('cliente_comprobante_venta', $venta->id) }}" target="_blank" class="btn btn-warning ms-2 edit-btn">
                                        <i class="fa fa-location-arrow" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Enlaces de paginación -->
                <div class="d-flex justify-content-center">
                    {{ $ventas->links() }}
                </div>

            @endif
            
        </div>
    </div>
</div>
@endsection

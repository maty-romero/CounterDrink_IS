@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4 mb-3" style="text-align: center;">Registrar una venta</h1>

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <i class="fas fa-table me-1"></i>
                        Productos
                    </div>
                    <div class="input-group w-25 col-auto">
                        <input type="text" id="searchInput" class="form-control" placeholder="Buscar producto">
                    </div>
                </div>
                <div class="card-body text-center">
                    <table class="table">
                        <thead class="text-center">
                            <tr>
                                <th>Cod Producto</th>
                                <th>Nombre</th>
                                <th>Marca</th>
                                <th>Stock</th>
                                <th>Precio</th>
                                <th>Capacidad ml</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productos as $producto)
                                <tr class="text-center">
                                    <td>{{ "#CRZ-00" . $producto->id }}</td>
                                    <td>{{ $producto->nombre_producto }}</td>
                                    <td>{{ $producto->marca }}</td>
                                    <td>{{ $producto->stock }}</td>
                                    <td>@money($producto->precio_producto)</td>
                                    <td>{{ $producto->capacidad_ml }}</td>
                                    <td class="action-buttons">
                                        <div class="d-flex justify-content-center">
                                            <button class="btn btn-warning ms-2"><i class="fas fa-eye"></i></button>
                                            <form method="POST" action="{{ route('ventas_agregar_producto', $producto->id) }}">
                                                @csrf
                                                <button type="submit" class="btn btn-success ms-2">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="msgInfo"></div>

        {{-- Detalle productos agregados --}}
        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <i class="fas fa-table me-1"></i>
                            Detalle de la venta
                        </div>
                        <div class="col-auto">
                            <a class="btn btn-warning btn-outline-dark m-1">Finalizar venta</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table" id="idDetalleVenta">
                        <thead class="text-center">
                            <tr>
                                <th>Nombre</th>
                                <th>Marca</th>
                                <th>Precio unitario</th>
                                <th>Cantidad</th>
                                <th>Precio total</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($detalleVenta))
                                @foreach($detalleVenta as $detalle)
                                    <tr class="text-center" data-id="{{ $detalle->elemento->id }}">
                                        <td>{{ $detalle->elemento->nombre_producto }}</td>
                                        <td>{{ $detalle->elemento->marca }}</td>
                                        <td>@money($detalle->elemento->precio_producto)</td>
                                        <td>
                                            <input class="input w-50 cantidad" type="number" value="{{ $detalle->unidades }}" min="1" max="{{ $detalle->elemento->stock }}" data-id="{{ $detalle->elemento->id }}">
                                        </td>
                                        <td id="precio-total-{{ $detalle->elemento->id }}">@money($detalle->elemento->precio_producto * $detalle->unidades)</td>
                                        <td class="action-buttons">
                                            <div class="d-flex justify-content-center">
                                                <form method="POST" action="{{ route('ventas_eliminar_producto', $detalle->elemento->id) }}">
                                                    @csrf
                                                    <button type="submit" class="delete-btn ms-2">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="text-center">No hay productos en el detalle de la venta.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end">
                        @if(isset($subtotal) && !empty($subtotal))
                            <h4><strong>Subtotal: @money($subtotal)</strong></h4>
                        @else
                            <h4>&nbsp;</h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const cantidades = document.querySelectorAll('.cantidad');
            const msgInfo = document.getElementById('msgInfo');
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            cantidades.forEach(input => {
                input.addEventListener('input', function () {
                    const id = this.dataset.id;
                    const cantidad = parseInt(this.value);

                    fetch(`/ventas/actualizar/${id}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: JSON.stringify({ cantidad: cantidad })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.error) {
                            msgInfo.innerHTML = `<div class="alert alert-danger">${data.error}</div>`;
                            return;
                        }
                        msgInfo.innerHTML = ''; 

                        if (data.success) {
                            const precioTotalElement = document.getElementById(`precio-total-${id}`);
                            precioTotalElement.innerText = `$${data.precio_total.toFixed(2)}`;
                            actualizarSubtotal(data.subtotal);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                });
            });

            function actualizarSubtotal(subtotal) {
                const subtotalElement = document.querySelector('.d-flex.justify-content-end h4');
                if (subtotalElement) {
                    subtotalElement.innerHTML = subtotal ? `<strong>Subtotal: $${subtotal.toFixed(2)}</strong>` : '&nbsp;';
                }
            }
        });
    </script>
@endsection

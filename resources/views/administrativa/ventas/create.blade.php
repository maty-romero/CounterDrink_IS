@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4 mb-3" style="text-align: center;">Registrar una venta</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

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
                                    <td>{{ "#CRZ-0" . $producto->id }}</td>
                                    <td>{{ $producto->nombre_producto }}</td>
                                    <td>{{ $producto->marca }}</td>
                                    <td>{{ $producto->stock }}</td>
                                    <td>@money($producto->precio_producto)</td>
                                    <td>{{ $producto->capacidad_ml }}</td>
                                    <td class="action-buttons">
                                        <div class="d-flex justify-content-center">
                                            <button type="button" class="btn btn-warning ms-2 view-product" data-bs-toggle="modal" data-bs-target="#productModal" data-product="{{ json_encode($producto) }}">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            
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
                            <form method="POST" action="{{ route('venta_presencial_finalizar') }}">
                                @csrf
                                <button type="submit" class="btn btn-warning btn-outline-dark m-1">Finalizar venta</button>
                            </form>
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


    <!-- Modal Ver Producto -->
    <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel">Detalles del producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img id="productImage" class="card-img-top mb-5 mb-md-0" width="250" height="450" src="" alt="..." />
                        </div>
                        <div class="col-md-6">
                            <div class="small mb-1">C&oacute;digo de producto: <span id="productCode"></span></div>
                            <h1 class="display-5 fw-bolder" id="productName"></h1>
                            <div class="fs-5 mb-4">
                                <span id="productPrice"></span>
                            </div>
                            <p class="lead" id="productDescription"></p>
                            <p class="lead">Tipo de bebida: <span id="productType"></span></p>
                            <p class="lead">Marca: <span id="productBrand"></span></p>
                            <p class="lead">Contenido de la unidad: <span id="productCapacity"></span> ml</p>
                            <p class="lead">Contenido de alcohol: <span id="productAlcohol"></span>%</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>


    <script src="{{asset('js/editarCantVenta.js')}}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const viewProductButtons = document.querySelectorAll('.view-product');
            
            viewProductButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const product = JSON.parse(this.getAttribute('data-product'));
    
                    document.getElementById('productImage').src = product.imagenURL;
                    document.getElementById('productCode').innerText = `#CRZ-0${product.id}`;
                    document.getElementById('productName').innerText = product.nombre_producto;
                    document.getElementById('productPrice').innerText = `$${product.precio_producto}`;
                    document.getElementById('productDescription').innerText = product.descripcion;
                    document.getElementById('productType').innerText = product.tipo_bebida;
                    document.getElementById('productBrand').innerText = product.marca;
                    document.getElementById('productCapacity').innerText = Math.round(product.capacidad_ml);
                    document.getElementById('productAlcohol').innerText = Math.round(product.contenido_alcohol);
                });
            });
        });
    </script>

@endsection

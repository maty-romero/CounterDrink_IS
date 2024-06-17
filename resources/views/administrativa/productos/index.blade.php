@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4" style="text-align: center; margin-bottom: 50px;">Productos</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            <div>
                <i class="fas fa-table me-1"></i>
                Tabla de productos
            </div>
            @if (Auth::user()->rol_usuario == 'administrador' || Auth::user()->rol_usuario == 'abastecedor')
                <div>
                    <a class="btn btn-primary" href="{{ route('productos_create') }}">Agregar nuevo producto</a>
                </div>   
            @endif
        </div>
        <div class="card-body">
            <table id="elementsTable" class="table text-center">
                <thead>
                    <tr>
                        <th>Cod Producto</th>
                        <th>Nombre producto</th>
                        <th>Marca</th>
                        <th>Stock</th>
                        <th>Precio</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productos as $producto)
                    <tr>
                        <td>{{ "CRZ-0" . $producto->id }}</td>
                        <td>{{ $producto->nombre_producto }}</td>
                        <td>{{ $producto->marca }}</td>
                        <td>{{ $producto->stock }}</td>
                        <td><span>@money($producto->precio_producto)</span></td>
                        <td class="action-buttons">
                            <div class="d-flex justify-content-center">
                                @if (Auth::user()->rol_usuario == 'administrador' || Auth::user()->rol_usuario == 'abastecedor')
                                    <a href="{{ route('productos_edit', $producto->id) }}" class="btn btn-warning me-2 edit-btn">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger ms-2 delete-btn"
                                            data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"
                                            data-url="{{ route('productos_destroy', $producto->id) }}">
                                            <i class="fas fa-trash-alt text-white"></i>
                                    </button>
                                    &nbsp;&nbsp;
                                @endif

                                <button type="button" class="btn btn-info ms-2 view-product" data-bs-toggle="modal" data-bs-target="#productModal" data-product="{{ json_encode($producto) }}">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- Enlaces de paginación -->
            <div class="d-flex justify-content-center">
                {{ $productos->links() }}
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

<script src="{{asset('js/fillModalProduct.js')}}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var table = new simpleDatatables.DataTable("#elementsTable", {
            labels: {
                placeholder: "Buscar...", // El placeholder del input de búsqueda
                perPage: "{select} elementos por página", // La etiqueta del dropdown per-page
                noRows: "No se encontraron coincidencias con su búsqueda", // Mensaje mostrado cuando no hay registros
                info: "", // La etiqueta de información
                noResults: "No se encontraron coincidencias con su búsqueda" // Mensaje al no encontrar coincidencias
            },
            perPageSelect: false // Oculta el dropdown de per-page
        });

        // Manejar la apertura del modal y pasar los datos del producto
        document.querySelectorAll('.view-product').forEach(function(button) {
            button.addEventListener('click', function() {
                var product = JSON.parse(this.getAttribute('data-product'));
                document.getElementById('productImage').src = product.imagenURL || '';
                document.getElementById('productCode').textContent = "CRZ-0" + product.id;
                document.getElementById('productName').textContent = product.nombre_producto;
                document.getElementById('productPrice').textContent = product.precio_producto;
                document.getElementById('productDescription').textContent = product.descripcion;
                document.getElementById('productType').textContent = product.tipo_bebida;
                document.getElementById('productBrand').textContent = product.marca;
                document.getElementById('productCapacity').textContent = product.capacidad_ml;
                document.getElementById('productAlcohol').textContent = product.contenido_alcohol;
            });
        });
    });
</script>

@endsection



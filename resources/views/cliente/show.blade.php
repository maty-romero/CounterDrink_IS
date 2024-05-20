<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Producto</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('assets/css/stylesClientSide.css')}}" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <x-cliente.navbar />
        <!-- Product section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    {{-- Tamaño imagen: 600x700--}}
                    <div class="col-md-6">
                        <img class="card-img-top mb-5 mb-md-0" width="700" height="600" src="{{$producto->imagenURL}}" alt="..." />
                    </div>
                    <div class="col-md-6">
                        <div class="small mb-1">C&oacute;digo de producto: #CRZ-0{{$producto->id}}</div>
                        <h1 class="display-5 fw-bolder">{{$producto->nombre_producto}}</h1>
                        <div class="fs-5 mb-4">
                            <span>${{$producto->precio_producto}}</span>
                        </div>
                        <p class="lead">{{$producto->descripcion}}</p>
                        <p class="lead">Tipo de bebida: {{$producto->tipo_bebida}}</p>
                        <p class="lead">Marca: {{$producto->marca}}</p>
                        <p class="lead">Contenido de la unidad: {{round($producto->capacidad_ml)}} ml</p>
                        <p class="lead">Contenido de alcohol: {{round($producto->contenido_alcohol)}}%</p>
                        <div class="d-flex">
                            
                            @if (!$enCarrito)
                                <form method='POST' action='{{ route('carrito_agregar', ['id' => $producto->id]) }}' class="d-flex align-items-center">
                                    @csrf
                                    <input class="form-control text-center me-3" name="unidadesProducto" id="unidadesProducto" min='1' max='{{ $producto->stock }}' type="number" value="1" style="max-width: 5rem" />
                                    <button class="btn btn-outline-dark flex-shrink-0" type="submit">
                                        <i class="bi-cart-fill me-1"></i>
                                        Añadir al carrito
                                    </button> 
                                </form>
                            @else
                                {{-- Ya esta en el carrito --}} 
                                <input disabled class="form-control text-center me-3" name="unidadesProducto" id="unidadesProducto" min='1' max='{{$producto->stock}}' type="number" value="1" style="max-width: 5rem" />
                                <button class="btn btn-outline-dark flex-shrink-0" type="submit" disabled>
                                    <i class="bi-cart-fill me-1"></i>
                                    Añadir al carrito
                                </button> &nbsp;&nbsp;<span class="text-danger font-weight-bold mt-1">Este producto ya est&aacute; en el carrito</span>  
                            @endif
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Related items section-->
        <section class="py-5 bg-light">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4">Productos relacionados</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @foreach ($productos_relacionados as $producto)
                        <x-cliente.itemCard 
                            :id="$producto->id"
                            :imagenURL="$producto->imagenURL"
                            :nombreProducto="$producto->nombre_producto"
                            :precioUnitario="$producto->precio_producto"
                        />
                    @endforeach    
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>

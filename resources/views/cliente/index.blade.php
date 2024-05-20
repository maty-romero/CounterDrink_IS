<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Home page</title>
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
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">CounterDrink</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Explora el mundo en cada sorbo</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            {{-- 
            @if(session()->has('carrito'))
                <pre>{{ json_encode(session('carrito'), JSON_PRETTY_PRINT) }}</pre>
            @else
                <p>No hay productos en el carrito.</p>
            @endif
            --}}

            <div class="container px-4 px-lg-5">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="d-flex mb-5 align-items-center">
                    <div class="input-group w-50">
                        <input type="text" class="form-control" placeholder="Buscar">
                        <button class="btn btn-warning" type="submit"><i class="bi bi-search"></i></button>
                    </div>
                    <span class="ms-3">Resultados de la búsqueda para "producto 1"</span>
                </div>

                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @foreach ($productos as $producto)
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
        <!-- Core theme JS
        <script src="js/scripts.js"></script>
        -->
    </body>
</html>

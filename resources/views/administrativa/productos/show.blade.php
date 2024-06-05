@extends('layouts.admin')

@section('content')
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Detalle del Producto - {{ $producto->nombre_producto }}</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('assets/css/stylesClientSide.css') }}" rel="stylesheet" />
    </head>
    <body>
        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    {{-- Tamaño imagen: 600x700--}}
                    <div class="col-md-6">
                        <img class="card-img-top mb-5 mb-md-0" width="700" height="600" src="{{ asset($producto->imagenURL) }}" alt="{{ $producto->nombre_producto }}"/>
                    </div>
                    <div class="col-md-6">
                        <h1 class="display-5 fw-bolder">{{ $producto->nombre_producto }}</h1>
                        <div class="fs-5 mb-4">
                            <span>${{ $producto->precio_producto }}</span>
                        </div>
                        <p class="lead">{{ $producto->descripcion }}</p>
                        <p class="lead">Tipo de bebida: {{ $producto->tipo_bebida }}</p>
                        <p class="lead">Marca: {{ $producto->marca }}</p>
                        <p class="lead">Contenido de la unidad: {{ $producto->capacidad_ml }}ml</p>
                        <p class="lead">Contenido de alcohol: {{ $producto->contenido_alcohol }}%</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
@endsection
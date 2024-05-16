<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Drink Counter</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Drink Counter</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        </nav>
        <div id="layoutSidenav">
            
            <x-nav-bar />

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4 mb-3" style="text-align: center;">Registrar una venta</h1>
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between">
                                <div>
                                    <i class="fas fa-table me-1"></i>
                                    Productos
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <x-tabla : columna="Nro Producto,Nombre,Marca,Stock,Precio,capacidad en (Lts),Accion">
                                    @php
                                        $productos = [
                                            ['id' => 1, 'nombre' => 'Producto 1', 'marca' => 'Marca 1', 'stock' => 10, 'precio' => 20.50, 'capacidad' => '500ml'],
                                            ['id' => 2, 'nombre' => 'Producto 2', 'marca' => 'Marca 2', 'stock' => 5, 'precio' => 15.75, 'capacidad' => '1L'],
                                            ['id' => 3, 'nombre' => 'Producto 3', 'marca' => 'Marca 3', 'stock' => 8, 'precio' => 30.00, 'capacidad' => '750ml'],
                                            ['id' => 4, 'nombre' => 'Producto 4', 'marca' => 'Marca 4', 'stock' => 3, 'precio' => 25.25, 'capacidad' => '1.5L'],
                                            ['id' => 5, 'nombre' => 'Producto 5', 'marca' => 'Marca 5', 'stock' => 12, 'precio' => 18.90, 'capacidad' => '330ml'],
                                        ];
                                    @endphp
                                    @foreach($productos as $producto)
                                        <tr class="text-center">
                                            <td>{{ $producto['id'] }}</td>
                                            <td>{{ $producto['nombre'] }}</td>
                                            <td>{{ $producto['marca'] }}</td>
                                            <td>{{ $producto['stock'] }}</td>
                                            <td>{{ $producto['precio'] }}</td>
                                            <td>{{ $producto['capacidad'] }}</td>
                                            <td class="action-buttons">
                                                <div class="d-flex justify-content-center">
                                                    <button class="btn btn-warning ms-2"><i class="fas fa-eye"></i></button>
                                                    <span class="mx-2"></span>
                                                    <button class="btn btn-success"><i class="fas fa-check"></i></button>
                                                </div>
                                            </td>    
                                        </tr>
                                    @endforeach
                                </x-tabla>
                            </div>
                        </div>
                    </div>

                    
                    {{-- Detalle productos agregados --}}
                    <div class="container-fluid px-4 ">
                        <div class="card mb-4">
                            <div class="card-header">
                                <div class="row">
                                <div class="col">
                                    <i class="fas fa-table me-1"></i>
                                    Detalle de la venta
                                </div>
                                <div class="col-auto">
                                    {{-- Btn finalizar venta --}}
                                    <a class="btn btn-warning btn-outline-dark m-2">Registrar venta</a>
                                </div>
                            </div>
                                <div class="card-body">

                                    <table class="table">
                                        <thead class="text-center">
                                            <th>Nombre</th>
                                            <th>Marca</th>
                                            <th>Precio unitario</th>
                                            <th>Cantidad</th>
                                            <th>Precio total</th>
                                            <th>Accion</th>
                                        </thead>
                                        <tbody>
                                            @php
                                                $productos = [
                                                    ['nombre' => 'Producto 1', 'marca' => 'Marca 1', 'cantidad' => 10, 'precio' => 20.50],
                                                    ['nombre' => 'Producto 3', 'marca' => 'Marca 3', 'cantidad' => 8, 'precio' => 30.00],
                                                    ['nombre' => 'Producto 5', 'marca' => 'Marca 5', 'cantidad' => 12, 'precio' => 18.90],
                                                ];
                                            @endphp
                                            @foreach($productos as $producto)
                                                <tr class="text-center">
                                                    <td>{{ $producto['nombre'] }}</td>
                                                    <td>{{ $producto['marca'] }}</td>
                                                    <td>${{ $producto['precio'] }}</td>
                                                    <td>
                                                        <input class="input w-25" type="number" value="{{ $producto['cantidad'] }}">
                                                    </td>
                                                    <td>${{ $producto['precio'] * $producto['cantidad']}}</td>
                                                    <td class="action-buttons">
                                                        <div class="d-flex justify-content-center">
                                                            <button class="delete-btn ms-2"><i class="fas fa-trash-alt"></i></button>
                                                        </div>
                                                    </td>    
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                    
                    
                </main>
            </div>
        </div>





        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('assets/demo/scripts.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('assets/demo/chart-area-demo.js')}}"></script>
        <script src="{{asset('assets/demo/chart-bar-demo.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('assets/demo/datatables-simple-demo.js') }}"></script>

    </body>
</html>
</html>

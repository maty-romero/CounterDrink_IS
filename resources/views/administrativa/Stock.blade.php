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
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Gestion</div>
                            <a class="nav-link"  href="{{ route('usuario.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Usuarios
                            </a>
                            <a class="nav-link" href="{{ route('proveedor.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Proveedores
                            </a>
                            <a class="nav-link" href="{{ route('producto.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Productos
                            </a>
                            <a class="nav-link" href="{{ route('venta.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Ventas
                            </a>
                            <a class="nav-link" href="{{ route('stock.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Stock
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4" style="text-align: center; margin-bottom: 50px;">Ingresar Stock</h1>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card mb-4">
                                        <div class="card-header d-flex justify-content-between">
                                            <div>
                                                <i class="fas fa-table me-1"></i>
                                                Tabla de stock
                                            </div>
                                        </div>
                                        <x-tabla : columna="Nro Producto,Nombre,Marca,Stock Actual,Stock Ingresado,Accion" >
                                            @php
                                                $datos = [
                                                            ['Nro Producto'=>'1','Nombre' => 'Whisky', 'Marca' => 'Johnnie Walker', 'Tipo' => 'Escocés', 'Stock Actual' => '10', 'Stock Ingresado' => ''],
                                                            ['Nro Producto'=>'2','Nombre' => 'Vino Tinto', 'Marca' => 'Trapiche', 'Tipo' => 'Malbec', 'Stock Actual' => '25', 'Stock Ingresado' => '' ],
                                                            ['Nro Producto'=>'3','Nombre' => 'Vino Blanco', 'Marca' => 'Santa Julia', 'Tipo' => 'Chardonnay', 'Stock Actual' => '18', 'Stock Ingresado' => '' ],
                                                            ['Nro Producto'=>'4','Nombre' => 'Cerveza', 'Marca' => 'Heineken', 'Tipo' => 'Lager', 'Stock Actual' => '30', 'Stock Ingresado' => '' ],
                                                            ['Nro Producto'=>'5','Nombre' => 'Champagne', 'Marca' => 'Moët & Chandon', 'Tipo' => 'Brut', 'Stock Actual' => '5', 'Stock Ingresado' => '' ],
                                                            ['Nro Producto'=>'6','Nombre' => 'Vodka', 'Marca' => 'Absolut', 'Tipo' => 'Vodka', 'Stock Actual' => '15', 'Stock Ingresado' => '' ],
                                                            ['Nro Producto'=>'7','Nombre' => 'Ron', 'Marca' => 'Havana Club', 'Tipo' => 'Añejo', 'Stock Actual' => '8', 'Stock Ingresado' => '' ],
                                                            ['Nro Producto'=>'8','Nombre' => 'Tequila', 'Marca' => 'Patrón', 'Tipo' => 'Reposado', 'Stock Actual' => '12', 'Stock Ingresado' => '' ],
                                                            ['Nro Producto'=>'9','Nombre' => 'Gin', 'Marca' => 'Bombay Sapphire', 'Tipo' => 'London Dry', 'Stock Actual' => '20', 'Stock Ingresado' => '' ],
                                                            ['Nro Producto'=>'10','Nombre' => 'Vermut', 'Marca' => 'Martini', 'Tipo' => 'Rosso', 'Stock Actual' => '10', 'Stock Ingresado' => '' ],
                                                        ];
                                            @endphp

                                            @foreach($datos as $dato)
                                                <tr>
                                                    <td>{{ $dato['Nro Producto'] }}</td>
                                                    <td>{{ $dato['Nombre'] }}</td>
                                                    <td>{{ $dato['Marca'] }}</td>
                                                    <td>{{ $dato['Stock Actual'] }}</td>
                                                    <td><input type="text" name="stock_ingresado[]" value="{{ $dato['Stock Ingresado'] }}"></td>
                                                    <td>
                                                        <div class="d-flex justify-content-center">
                                                             <button class="btn btn-success"><i class="fas fa-check"></i></button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </x-tabla>
                                    </div>
                                </div>
                
                                <div class="col-md-4">
                                    <div class="card mb-4">
                                        <div class="card-header d-flex justify-content-between">
                                            <div>
                                                <i class="fas fa-table me-1"></i>
                                                Cambios Realizados
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <table id="cambiosRealizados" class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Nro Producto</th>
                                                        <th>Stock alterado</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>12</td>
                                                        <td>5</td>
                                                        <td class="action-buttons">
                                                            <button class="delete-btn ms-2" style="color: black; background-color: red"><i class="fas fa-trash-alt"></i></button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>-12</td>
                                                        <td class="action-buttons">
                                                                <button class="delete-btn ms-2" style="color: black; background-color: red"><i class="fas fa-trash-alt"></i></button>
                                                        </td>
                                                    </tr>
                                                    <!-- Aquí se agregarán las filas de los cambios realizados -->
                                                </tbody>
                                            </table>
                                            <button class="btn btn-primary" style="margin-top: 20px;">Confirmar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('assets/demo/scripts.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('assets/demo/chart-area-demo.js')}}"></script>
        <script src="{{asset('assets/demo/chart-bar-demo.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('assets/demo/datatables-simple-demo.js') }}"></script>

    </body>
</html>

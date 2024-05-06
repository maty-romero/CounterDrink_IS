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
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Usuarios
                            </a>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Proveedores
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Productos
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Ventas
                            </a>
                        </a>
                        <a class="nav-link" href="tables.html">
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
                                        <x-tabla type="stock">
                                            <x-slot name="titulo1">Nombre</x-slot>
                                            <x-slot name="titulo2">Marca</x-slot>
                                            <x-slot name="titulo3">Stock Actual</x-slot>
                                            <x-slot name="titulo4">Nro Producto</x-slot>
                                            <x-slot name="titulo6">Nuevo Stock</x-slot>
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
                                                            <button class="delete-btn"><i class="fas fa-trash-alt"></i></button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>-12</td>
                                                        <td class="action-buttons">
                                                            <button class="delete-btn"><i class="fas fa-trash-alt"></i></button>
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


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
                        <h1 class="mt-4" style="text-align: center; margin-bottom: 50px;">Proveedores</h1>
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between">
                                <div>
                                    <i class="fas fa-table me-1"></i>
                                    Tabla de Proveedores
                                </div>
                                <div>
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregarNuevoModal">Agregar Nuevo</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <x-tabla : columna="Nro Proveedor,Nombre,Cuit,Telefono,Email,Accion">
                                    @php
                                     $proveedores = [
                                                    ['id' => 1, 'nombre' => 'Proveedor 1', 'cuit' => '123456789', 'telefono' => '1234567890', 'email' => 'proveedor1@example.com'],
                                                    ['id' => 2, 'nombre' => 'Proveedor 2', 'cuit' => '987654321', 'telefono' => '0987654321', 'email' => 'proveedor2@example.com'],
                                                    ['id' => 3, 'nombre' => 'Proveedor 3', 'cuit' => '456789123', 'telefono' => '4567891230', 'email' => 'proveedor3@example.com'],
                                                    ['id' => 4, 'nombre' => 'Distribuidora de Vinos', 'cuit' => '30-24681012-1', 'telefono' => '+541199876543', 'email' => 'info@distribuidoravinos.com'],
                                                    ['id' => 5, 'nombre' => 'Destilería Los Andes', 'cuit' => '30-13579246-3', 'telefono' => '+541188765432', 'email' => 'ventas@destileriandes.com'],
                                                    ['id' => 6, 'nombre' => 'Importadora de Bebidas Exóticas', 'cuit' => '30-36925814-5', 'telefono' => '+541177777777', 'email' => 'info@importadorabebidas.com'],
                                                ];
                                    @endphp
                            
                                    @foreach($proveedores as $proveedor)
                                        <tr>
                                            <td>{{ $proveedor['id'] }}</td>
                                            <td>{{ $proveedor['nombre'] }}</td>
                                            <td>{{ $proveedor['cuit'] }}</td>
                                            <td>{{ $proveedor['telefono'] }}</td>
                                            <td>{{ $proveedor['email'] }}</td>
                                            <td class="action-buttons">
                                                <div class="d-flex justify-content-center">
                                                    <button class="edit-btn me-2"><i class="fas fa-edit"></i></button>
                                                    <button class="delete-btn ms-2"><i class="fas fa-trash-alt"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach 
                                </x-tabla>
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

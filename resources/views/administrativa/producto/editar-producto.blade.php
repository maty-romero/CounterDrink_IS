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
        <link href="{{asset('assets/css/form-registro.css')}}" rel="stylesheet" /> 
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
                        <h1 class="mt-4" style="text-align: center; margin-bottom: 50px;">Modificar producto</h1>
                        <div class="form-container">
                            <div class="form-card">
                                <form class="user">
                                    <div class="row mb-3">
                                        <div class="col-sm-6">
                                            <label class="col-form-label" for="name">Nombre:</label>
                                            <input class="form-control form-control-user" type="text" placeholder="Nombre" required="true" name="name" value="" title="">    
                                        </div>
                                            <div class="col-sm-6">
                                                <label class="col-form-label" for="stock">Stock:</label>
                                                <input class="form-control form-control-user" type="number" placeholder="stock" required="true" name="stock" value="" title="">
                                            </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label" for="email">Descripcion:</label>
                                        <textarea class="form-control form-control-user assistant-hide" placeholder="descripcion" id="descripcion-id" required="true" name="descripcion" title=""></textarea>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-6">
                                            <label class="col-form-label" for="precio">precio:</label>
                                            <input class="form-control form-control-user" type="number" placeholder="Precio"  id="precio-id" placeholder="precio" required="true" name="precio" value="" title="">
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="col-form-label" for="vol%">vol%:</label>
                                            <input class="form-control form-control-user" type="number" placeholder="vol%" required="true" name="vol%" value="" title="">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-6">
                                            <label class="col-form-label" for="Tipo">Tipo de bebida:</label>
                                            <input class="form-control form-control-user" type="text" id="Tipo-id" placeholder="Tipo de bebida" required="true" name="precio" value="" title="">
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="col-form-label" for="Capacidad">Capacidad (Lts):</label>
                                            <input class="form-control form-control-user" type="number" placeholder="Capacidad" required="true" name="Capacidad" value="" title="">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label" for="Marca">Marca:</label>
                                        <input class="form-control form-control-user assistant-hide" type="text" placeholder="Marca" id="Marca-id" required="true" name="Marca" value="" title="">
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label" for="image">Imagen del producto:</label>
                                        <input class="form-control form-control-user" type="file" id="image-id" name="image" title="">
                                    </div>                                    
                                    <button class="btn btn-primary d-block btn-user w-100" id="crear-cuenta-btn-id"
                                    type="submit">Modificar datos</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </body>
</html>

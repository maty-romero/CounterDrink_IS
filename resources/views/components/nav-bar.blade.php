<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Gestion</div>

                @php
                    $esAdministrador = Auth::user()->rol_usuario == 'administrador'; 
                    $esAbastecedor = Auth::user()->rol_usuario == 'abastecedor';
                    $esCajero = Auth::user()->rol_usuario == 'cajero';
                @endphp

                @if ($esAdministrador)
                    <a class="nav-link"  href="{{ route('usuarios_index') }}">
                        <div class="sb-nav-link-icon"><i class="fa fa-user"></i></div>
                        Usuarios
                    </a>    
                @endif
                
                @if ($esAdministrador || $esAbastecedor)
                    <a class="nav-link" href="{{ route('proveedores_index') }}">
                        <div class="sb-nav-link-icon"><i class="fa fa-truck"></i></div>
                        Proveedores
                    </a>    
                @endif
                
                <a class="nav-link" href="{{ route('productos_index') }}">
                    <div class="sb-nav-link-icon"><i class="fa fa-glass"></i></div>
                    Productos
                </a>
                <a class="nav-link" href="{{ route('ventas_index') }}">
                    <div class="sb-nav-link-icon"><i class="fa fa-credit-card-alt"></i></div>
                    Ventas
                </a>

                @if ($esAdministrador || $esAbastecedor)
                    <a class="nav-link" href="{{ route('stock_index') }}">
                        <div class="sb-nav-link-icon"><i class="fa fa-list-ol"></i></div>
                        Stock
                    </a>
                @endif
                
                @if ($esAdministrador || $esAbastecedor)
                    <a class="nav-link" href="{{ route('reportes_index') }}">
                        <div class="sb-nav-link-icon"><i class="fa fa-info"></i></div>
                        Reportes
                    </a>
                @endif
                
            </div>
        </div>
    </nav>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="#!">CounterDrink</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Sobre nosotros</a></li>
            </ul>
            <form class="d-flex">
                <a class="btn btn-outline-dark" href="{{ route('show_product') }}">
                    <i class="bi-cart-fill me-1"></i>
                    Carrito
                    <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                </a>
            </form>
            <ul class="navbar-nav ml-2">
                <a class="nav-link active" aria-current="page" href="{{ route('login') }}">Iniciar sesion</a>
            </ul>
        </div>
    </div>
</nav>
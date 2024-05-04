<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Item - Start Bootstrap Template</title>
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
                        <img class="card-img-top mb-5 mb-md-0" width="700" height="600" src="https://carrefourar.vtexassets.com/arquivos/ids/273585/7790717152002_01.jpg?v=638113013430030000" alt="..." />
                    </div>
                    <div class="col-md-6">
                        <div class="small mb-1">C&oacute;digo de producto: #CRZ-001</div>
                        <h1 class="display-5 fw-bolder">Vino tinto Novecento</h1>
                        <div class="fs-5 mb-4">
                            <span>$40.00</span>
                        </div>
                        <p class="lead">Sumérgete en el exquisito sabor de nuestro vino tinto, con notas de frutas maduras y un toque de especias. Perfecto para acompañar tus momentos más especiales. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed fermentum felis ac aliquet consectetur. Fusce nec nisi sit amet erat consequat ultricies. Quisque vestibulum vel turpis sed feugiat.</p>
                        <p class="lead">Tipo de bebida: Vino tinto</p>
                        <p class="lead">Marca: Novecento</p>
                        <p class="lead">Contenido de la unidad: 750ml</p>
                        <p class="lead">Contenido de alcohol: 7%</p>
                        <div class="d-flex">
                            <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                            <button class="btn btn-outline-dark flex-shrink-0" type="button">
                                <i class="bi-cart-fill me-1"></i>
                                Añadir al carrito
                            </button>
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
                    @for ($i = 0; $i <= 3; $i++)
                        <x-cliente.itemCard />
                    @endfor    
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

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
        <section class="h-100 h-custom" style="background-color: #e0d975;">
            <div class="container py-5 h-100">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                  <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body p-0">
                      <div class="row g-0">
                        @if (empty($carrito))
                        
                          <div class="p-5">
                            <div class="d-flex justify-content-between align-items-center mb-5">
                              <h1 class="fw-bold mb-0 text-black">Carrito de compras</h1>
                              <a class="btn btn-dark btn-block btn-lg" href="{{route('home_shop')}}">Volver a la tienda</a>
                            </div>
                            <div class="container mx-auto flex flex-wrap mb-1 overflow-hidden">
                              <h4 class='w-full bg-warning text-black font-bold text-2xl text-center p-5'>
                                  El carrito de compras est&aacute; vac&iacute;o
                              </h4>
                            </div>
                          </div>
                        
                          
                            
                        @else
                          <div class="col-lg-8">
                            <div class="p-5">
                              <div class="d-flex justify-content-between align-items-center mb-5">
                                <h1 class="fw-bold mb-0 text-black">Carrito de compras</h1>
                                <a class="btn btn-dark btn-block btn-lg" href="{{route('home_shop')}}">Volver a la tienda</a>
                              </div>

                              <prev>
                                Carrito: {{$carrito}}
                              </prev>
                              <prev>
                                Subtotal: {{$subtotal}}
                              </prev>

                              <hr class="my-4">
            
                              <x-cliente.itemCart 
                                imagenURL="https://carrefourar.vtexassets.com/arquivos/ids/273585/7790717152002_01.jpg?v=638113013430030000"
                                tipoProducto="Vino"
                                nombreProducto="Vino Centenario"
                                cantidad=2
                                precioUnitario="40.00"
                                precioTotal="80.00"
                              />

                              <x-cliente.itemCart 
                                imagenURL="https://mefisto.com.ar/pub/media/catalog/product/cache/52333d95353fd30dc93141d4ad672a12/c/i/ci-crn-bola-0030_1_.png"
                                tipoProducto="Cerveza"
                                nombreProducto="Cerveza Corona"
                                cantidad=1
                                precioUnitario="30.00"
                                precioTotal="30.00"
                              />
            
                              
            
                            </div>
                          </div>
                          <div class="col-lg-4 bg-grey">
                            <div class="p-5">
                              <h3 class="fw-bold mb-5 mt-2 pt-1">Resumen de la compra</h3>
                              <hr class="my-4">
            
                              <div class="d-flex justify-content-between mb-4">
                                <h5>2 Items agregados al carrito</h5>
                              </div>
            
                              <h4 class="mb-3">Datos retiro en sucursal</h5>
            
                              <div class="mb-5">
                                <div data-mdb-input-init class="form-outline">
                                  <label class="form-label" for="form3Examplea2">Nombre del cliente</label>
                                  <input type="text" id="form3Examplea2" class="form-control form-control-lg" />

                                  <label class="form-label" for="form3Examplea2">DNI</label>
                                  <input type="text" id="form3Examplea2" class="form-control form-control-lg" />

                                  <label class="form-label" for="form3Examplea2">Tel&eacute;fono</label>
                                  <input type="text" id="form3Examplea2" class="form-control form-control-lg" />
                                </div>
                              </div>
            
                              <hr class="my-4">
            
                              <div class="d-flex justify-content-between mb-5">
                                <h5 class="text-uppercase">Monto final</h5>
                                <h5>$110.00</h5>
                              </div>
            
                              <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn-block btn-lg"
                                data-mdb-ripple-color="dark">Pagar pedido</button>
            
                            </div>
                          </div>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        <!-- Footer-->
        <footer class="py-5 bg-white">
            <div class="container"><p class="m-0 text-center text-black">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>

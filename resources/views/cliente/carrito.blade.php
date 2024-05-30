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

                            {{-- 
                             @if(session()->has('carrito'))
                                <p>Carrito</p>
                                <pre>{{ json_encode(session('carrito'), JSON_PRETTY_PRINT) }}</pre>
                                
                                <p>Subtotal: {{ $subtotal }} </p>
                            @else
                                <p>No hay productos en el carrito.</p>
                            @endif
                            --}}  

                            @if(session()->has('msj'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('msj') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            
                            @if(session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                              <hr class="my-4">
            
                              @foreach ($carrito as $item)
                                <x-cliente.itemCart 
                                  :id="$item->elemento->id"
                                  :imagenURL="$item->elemento->imagenURL"
                                  :tipoProducto="$item->elemento->tipo_bebida"
                                  :nombreProducto="$item->elemento->nombre_producto"
                                  :cantidad="$item->unidades"
                                  :precioUnitario="$item->elemento->precio_producto"
                                  :precioTotal="$item->elemento->precio_producto * $item->unidades"
                                />  
                              @endforeach

                            </div>
                          </div>
                          <div class="col-lg-4 bg-grey">
                            <div class="p-5">
                              <h3 class="fw-bold mb-5 mt-2 pt-1">Resumen de la compra</h3>
                              <hr class="my-4">
            
                              <div class="d-flex justify-content-between mb-4">
                                <h5>{{count($carrito)}} Items agregados al carrito</h5>
                              </div>
                              <div class="d-flex justify-content-between mb-5">
                                <h5 class="text-uppercase">Monto final:</h5>
                                <h5>@money($subtotal)</h5>
                              </div>

                              <h5 class="mb-3">Datos retiro en sucursal</h5>
            
                              <form method='POST' action='{{ route('venta_online_finalizar') }}' id="infoClienteForm">
                                @csrf
                                <div class="mb-5">
                                    <div data-mdb-input-init class="form-outline" id="formDivFields">
                                        
                                        <label class="form-label" for="idNombreCliente">Nombre</label>
                                        <input type="text" id="idNombreCliente" name="nombre" class="form-control form-control-lg" value="{{ old('nombre') }}" required/>
                                        @error('nombre')
                                            <small style="color: red">{{ $message }}</small>
                                            <br>
                                        @enderror

                                        <label class="form-label" for="idApellidoCliente">Apellido</label>
                                        <input type="tel" id="idApellidoCliente" name="apellido" class="form-control form-control-lg" value="{{ old('apellido') }}" required/>
                                        @error('apellido')
                                            <small style="color: red">{{ $message }}</small>
                                            <br>
                                        @enderror

                                        <label class="form-label" for="idDniCliente">DNI</label>
                                        <input type="number" id="idDniCliente" name="dni" class="form-control form-control-lg" value="{{ old('dni') }}" required/>
                                        @error('dni')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror  
                                    </div>   
                                </div>
                            
                                <hr class="my-4">
                            
                                <button type="button" class="btn btn-dark btn-block btn-lg" data-bs-toggle="modal" data-bs-target="#paymentModal">Pagar pedido</button>
                              </form>
                            
                            
                          </div>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>

          <!-- Modal -->
          <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="paymentModalLabel">Selecciona el Medio de Pago</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="medioPago">Medio de Pago</label>
                            <select class="form-control" id="medioPago" name="medio_pago">
                                <option value="mercadopago">Mercado Pago</option>
                                <option value="paypal">PayPal</option>
                                <option value="tarjeta_credito">Otro medio pago</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" id="confirmPayment">Confirmar Pago</button>
                    </div>
                </div>
            </div>
          </div>

        <!-- Footer-->
        <footer class="py-5 bg-white">
            <div class="container"><p class="m-0 text-center text-black">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>

<script>
  document.addEventListener('DOMContentLoaded', function () {
      document.getElementById('confirmPayment').addEventListener('click', function () {
          var medioPago = document.getElementById('medioPago').value;
          var inputMedioPago = document.createElement('input');
          inputMedioPago.type = 'hidden';
          inputMedioPago.name = 'medio_pago';
          inputMedioPago.value = medioPago;

          var ventaFormDiv = document.getElementById('formDivFields');
          ventaFormDiv.appendChild(inputMedioPago);

          var ventaForm = document.getElementById('infoClienteForm');
          ventaForm.submit();
      });
  });
</script>

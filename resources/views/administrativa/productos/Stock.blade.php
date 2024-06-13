@extends('layouts.admin')

@section('content')
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
                    <x-tabla :columna="['Nro Producto','Nombre','Marca','Stock Actual','Stock Ingresado','Accion']">
                        @foreach($productos as $producto)
                        <tr>
                            <td>{{ "#CRZ-0" . $producto['Nro Producto'] }}</td>
                            <td>{{ $producto['Nombre'] }}</td>
                            <td>{{ $producto['Marca'] }}</td>
                            <td>{{ $producto['Stock'] }}</td>
                            <td><input type="text" name="stock_ingresado[]" value=""></td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-success" onclick="agregarCambio(this)"><i class="fas fa-check"></i></button>
                                </div>
                            </td>
                        </tr>
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
                            <tbody id="cambios">
                            </tbody>
                        </table>
                        <form id="formConfirmar" action="{{ route('stock_update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="cambios" id="inputCambios">
                            <button type="button" id="confirmarBtn" class="btn btn-primary" style="margin-top: 20px;">Confirmar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    
    {{-- Scripts --}}   
    <script src="{{ asset('/assets/js/stock.js') }}"></script>
    <script src="{{asset('js/searchInTable.js')}}"></script>
@endsection

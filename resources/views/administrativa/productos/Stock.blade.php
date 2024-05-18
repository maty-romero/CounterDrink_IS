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
@endsection

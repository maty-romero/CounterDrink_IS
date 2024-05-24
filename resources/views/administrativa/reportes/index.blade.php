@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <div class="container-fluid px-4">
        <h1 class="mt-4" style="text-align: center; margin-bottom: 50px;">Reportes</h1>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form action="{{ route('home_shop') }}" method="GET">
                    <div class="form-group mt-3">
                        <label for="tipo_reporte">Tipo de Reporte:</label>
                        <select class="form-control" id="tipo_reporte" name="tipo_reporte">
                            <option value="productos_mas_vendidos">Productos más vendidos</option>
                            <option value="ventas_realizadas">Ventas realizadas</option>
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <label for="fecha_desde">Fecha Desde:</label>
                        <input type="date" class="form-control" id="fecha_desde" name="fecha_desde">
                    </div>
                    <div class="form-group mt-3">
                        <label for="fecha_hasta">Fecha Hasta:</label>
                        <input type="date" class="form-control" id="fecha_hasta" name="fecha_hasta">
                    </div>
                    <button type="submit" class="btn btn-warning mt-4">Generar Reporte</button>
                </form>
            </div>
        </div>
    </div>
    
</div>    
@endsection

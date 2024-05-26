<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta; 
use PHPJasper\PHPJasper;
use Illuminate\Support\Facades\Validator;

class ReporteController extends Controller
{
    public function index()
    {
        return view('administrativa.reportes.index');
    }

    public function comprobanteVenta(string $comprobante)
    {
        $ventaCheck = Venta::where("id", $comprobante)->get(); 

        if (count($ventaCheck) === 0) {
            return abort(404);
        }
        $jasper = new PHPJasper();

        $path_subreport = base_path() . '/database/reportes/';
        $input = base_path() . '\database\reportes\FacturaCliente.jrxml';
        $output = base_path() . '\database\reportes\output\FacturaCliente';

        $nombre_cliente = "Juan perez"; 
        $dni = "1258452"; 

        $options = [
            'format' => ['pdf'],
            'locale' => 'en',
            'params' => [
                'NroVenta' => $comprobante,
                'nombre_cliente' => $nombre_cliente,
                'dni' => $dni,
                "SubReportPath" => $path_subreport
            ],
            'db_connection' => [
                //datos conexión base
                'driver' => 'mysql',
                'host' => '127.0.0.1',
                'port' => '3306',
                'database' => 'counterdrink',
                'username' => 'root'
            ],
        ];

        $jasper->compile($input)->execute();
        $jasper->process($input, $output, $options)->execute();
        $pathToFile = base_path() . '\database\reportes\output\FacturaCliente.pdf';

        return response()->file($pathToFile);
    }

    public function reporteRedirect(Request $request)
    {
        //dd($request);
        $fechaDesde = $request->fecha_desde; 
        $fechaHasta = $request->fecha_hasta;
       
        $jasper = new PHPJasper();
        if ($request->input('tipo_reporte') == "productos_mas_vendidos") 
        {

            //dd("Productos mas vendidos");
            $input = base_path() . '\database\reportes\Productos_Mas_Vendidos.jrxml';
            $output = base_path() . '\database\reportes\output\ProductosMasVendidos';

            $options = [
                'format' => ['pdf'],
                'locale' => 'en',
                'params' => [
                    'Fecha_inicio' => strval($fechaDesde),
                    'Fecha_fin' => strval($fechaHasta),
                ],
                'db_connection' => [
                    //datos conexión base
                    'driver' => 'mysql',
                    'host' => '127.0.0.1',
                    'port' => '3306',
                    'database' => 'counterdrink',
                    'username' => 'root',

                ],
            ];
            
            $pathToFile = base_path() . '\database\reportes\output\ProductosMasVendidos.pdf';

            $jasper->compile($input)->execute();
            $jasper->process($input, $output, $options)->execute();
            return response()->file($pathToFile);
        } 

        if($request->input('tipo_reporte') == "ventas_realizadas")
        {
            $input = base_path() . '\database\reportes\VentasRealizadas.jrxml';
            $output = base_path() . '\database\reportes\output\VentasRealizadas';

            $options = [
                'format' => ['pdf'],
                'locale' => 'en',
                'params' => [
                    'Fecha_inicio' => strval($fechaDesde),
                    'Fecha_fin' => strval($fechaHasta),
                ],
                'db_connection' => [
                    //datos conexión base
                    'driver' => 'mysql',
                    'host' => '127.0.0.1',
                    'port' => '3306',
                    'database' => 'counterdrink',
                    'username' => 'root',

                ],
            ];
            
            $pathToFile = base_path() . '\database\reportes\output\VentasRealizadas.pdf';

            $jasper->compile($input)->execute();
            $jasper->process($input, $output, $options)->execute();
            return response()->file($pathToFile);
        }
            
        
    }
}

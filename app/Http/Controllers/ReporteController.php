<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta; 
use PHPJasper\PHPJasper;

class ReporteController extends Controller
{
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
}

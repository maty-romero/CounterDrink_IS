<?php

namespace App\Models;

use App\Interfaces\IPasarela;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Exception; 

class PasarelaFactory extends Model
{
    use HasFactory;
    private $pasarelas = ['mercadopago', 'paypal']; 
    public static function crearPasarela(string $pasarela) : IPasarela 
    {
        // existeOpcionPago()
        switch ($pasarela) {
            case 'mercadopago':
                return new MercadoPagoPasarela();
            // Agregar más casos para otras pasarelas de pago
            default:
                return null; 
                //throw new Exception("Pasarela de pago no válida: $pasarela");
        }
    }

    private static function existeOpcionPago()
    {
        // verificacion que lo ingresado exista  
    } 
}

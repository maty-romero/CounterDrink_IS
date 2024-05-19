<?php

namespace App\Models;

use App\Interfaces\IPasarela;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MercadoPagoPasarela extends Model implements IPasarela
{
    use HasFactory;
    public function pagar(float $monto)
    {
        return rand(0,1) == 1; // Simulacion de pago  
    }
}

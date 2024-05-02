<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    protected $fillable = [
        "fecha_venta",
        "monto_final_venta",
        "nro_pago",
    ];
    protected $table = "ventas"; 
    
}

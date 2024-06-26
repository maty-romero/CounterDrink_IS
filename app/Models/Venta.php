<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Venta extends Model
{
    use HasFactory;
    protected $fillable = [
        "fecha_venta",
        "monto_final_venta",
        "nro_pago",
    ];
    protected $table = "ventas"; 

    // M-M producto venta
    public function producto(): BelongsToMany 
    {
        return $this->belongsToMany(Producto::class, "producto_venta", "id_venta", "id_producto")
            ->withPivot('unidades_vendidas_prod');
    }
    
}

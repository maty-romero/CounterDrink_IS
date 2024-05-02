<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Producto extends Model
{
    
    use HasFactory;
    protected $fillable = [
        "nombre_producto",
        "descripcion",
        "imagenURL",
        "stock",
        "precio_producto",
        "contenido_alcohol",
        "tipo_bebida",
        "capacidad_ml",
        "marca",
        "id_proveedor"
    ];
    protected $table = "productos";
    
    // M:M producto-venta
    public function venta(): BelongsToMany
    {
        return $this->belongsToMany(Producto::class, "producto_venta", "id_producto", "id_venta")
            ->withPivot('unidades_vendidas_prod');
    }

    // M:1 producto-proveedor
    public function proveedor(): BelongsTo
    {
        return $this->belongsTo(Proveedor::class);
    }
    
}

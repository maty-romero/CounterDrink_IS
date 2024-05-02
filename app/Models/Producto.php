<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    
}

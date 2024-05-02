<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;

class Proveedor extends Model
{
    use HasFactory;
    protected $fillable = [
        "nombre_proveedor",
        "cuit",
        "nro_telefono",
        "email"
    ];
    protected $table = "proveedores";

    // 1:M proveedor-producto
    public function producto(): hasMany
    {
        return $this->hasMany(Producto::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    
}

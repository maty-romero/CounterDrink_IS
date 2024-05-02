<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductosVendidos extends Model
{
    use HasFactory;
    protected $fillable = [
        "unidades_vendidas_prod"
    ];
    protected $table = "productos_vendidos";
    
}

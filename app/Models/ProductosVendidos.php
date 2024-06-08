<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductosVendidos extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        "unidades_vendidas_prod"
    ];
    protected $table = "productos_vendidos";
    
}

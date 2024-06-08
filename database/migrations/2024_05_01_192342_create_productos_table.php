<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_producto', 100)->unique();
            $table->string('descripcion', 500)->nullable();
            $table->string('imagenURL'); 
            $table->integer('stock')->default(1);
            $table->decimal('precio_producto', 12, 2)->default(0.00);
            $table->decimal('contenido_alcohol', 12, 2)->default(0.00);
            $table->enum('tipo_bebida', ['cerveza', 'vino', 'whisky', 'vodka']);
            $table->decimal('capacidad_ml', 12, 2)->default(0.00);
            $table->string('marca', 100);
            $table->timestamps();

            $table->unsignedBigInteger('id_proveedor');
            $table->foreign('id_proveedor')->references('id')->on('proveedores');

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};

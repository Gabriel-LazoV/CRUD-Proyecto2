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
        Schema::create('venta__detalles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cantidad');
            $table->float('precio_unitario');
            $table->timestamps();
            $table->foreignId('producto_id')->constrained();
            $table->foreignId('venta_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venta__detalles');
    }
};

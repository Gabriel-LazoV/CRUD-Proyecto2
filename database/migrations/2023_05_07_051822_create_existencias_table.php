<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExistenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * */
    public function up()
    {
        Schema::create('existencias', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cantidad');
            $table->string('ubicacion');
            $table->foreignId('producto_id')->constrained();

            // $table->foreign('producto_id')->references('id')->on('productos');
        });
    }

    /**
     * Reverse the migrations.
     * 
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('existencias');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FacturaDetalle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('factura_detalle', function (Blueprint $table) {
            $table->id('fad_id');
            $table->foreignId('fac_id')->references('fac_id')->on('factura');
            $table->foreignId('hab_id')->references('hab_id')->on('habitaciones');
            
            
            $table->float('fad_vt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factura_detalle');
        
    }
}

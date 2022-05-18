<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Factura extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factura', function (Blueprint $table) {
            $table->id('fac_id');
            // $table->foreignId('fac_id')->references('fac_id')->on('factura');
            $table->foreignId('cli_id')->references('cli_id')->on('clientes');
            
            
            $table->float('fac_vt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factura');
        
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis_attrs', function (Blueprint $table) {
            $table->id();
            $table->string('id_product');
            $table->string('id_transaksi');   
            $table->string('qty');
            $table->integer('total_price');
            $table->integer('dp')->nullable();
            $table->integer('total_dp')->nullable();
            $table->string('status_dp')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis_attrs');
    }
};

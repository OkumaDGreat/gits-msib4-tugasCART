<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 
return new class extends Migration
{
    public function up()
    {
        Schema::create('keranjang', function (Blueprint $table) {
            $table->id('id_keranjang');
            $table->integer('qty')->nullable();
            $table->integer('subtotal')->nullable(); 
            $table->bigInteger('id')->nullable()->default(20);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('keranjang');
    }
};
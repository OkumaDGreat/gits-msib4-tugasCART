<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 
return new class extends Migration
{
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->string('product_name')->nullable();
			$table->string('product_category')->nullable();
            $table->text('product_description');
            $table->string('photo')->nullable();
            $table->integer("price")->nullable(); 
            $table->timestamps();
        });
        
    }
    public function down()
    {
        Schema::dropIfExists('barang');
    }
};
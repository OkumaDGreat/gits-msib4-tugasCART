<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 
return new class extends Migration
{
    public function up()
    {
        Schema::create('kategori', function (Blueprint $table) {
            $table->id();
			$table->string('name');
			$table->timestamps();
        });

        Schema::table('barang', function (Blueprint $table) {
			$table->dropColumn('product_category');
			$table->foreignId('id_category')->references('id')->on('kategori');
		});
	
    }
    public function down()
    {
        Schema::dropIfExists('kategori');
    }
};
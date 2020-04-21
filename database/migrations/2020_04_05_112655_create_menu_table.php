<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->id();
            $table->string('kode_menu');
            $table->string('nama_menu');
            $table->unsignedBiginteger('satuan_id');
            $table->foreign('satuan_id')->references('id')->on('satuan')->onDelete('restrict');
            $table->unsignedBiginteger('kategori_id');
            $table->foreign('kategori_id')->references('id')->on('kategori')->onDelete('restrict');
            $table->integer('stok');
            $table->integer('harga');
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
        Schema::dropIfExists('menu');
    }
}

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
        Schema::create('produknon', function (Blueprint $table) {
            $table->bigIncrements('id_produknon');
            $table->string('nama_produk');
            $table->integer('kategori');
            $table->string('harga_produk')->nullable();
            $table->string('foto_produk1')->nullable();
            $table->string('foto_produk2')->nullable();
            $table->string('foto_produk3')->nullable();
            $table->string('foto_produk4')->nullable();
            $table->text('deskripsi');
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
        Schema::dropIfExists('produknon');
    }
};

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
        Schema::create('pesanan', function (Blueprint $table) {
            $table->bigIncrements('id_pesanan');
            $table->integer('id_user');
            $table->integer('id_produk');
            $table->integer('quantity');
            $table->integer('id_alamat');
            $table->integer('id_kota');
            $table->string('variasi')->nullable();
            $table->string('variasi_harga')->nullable();
            $table->bigInteger('variasi_total')->nullable();
            $table->string('sablon')->nullable();
            $table->string('sablon_harga')->nullable();
            $table->bigInteger('sablon_total')->nullable();
            $table->text('note_sablon_variasi')->nullable();
            $table->bigInteger('bayar')->nullable();
            $table->bigInteger('ongkir')->nullable();
            $table->bigInteger('total_bayar')->nullable();
            $table->text('bukti_bayar')->nullable();
            $table->text('no_resi')->nullable();
            $table->text('desain')->nullable();
            $table->text('request_user')->nullable();
            $table->bigInteger('total_dp')->nullable();
            $table->text('bukti_bayar_dp')->nullable();
            $table->text('bukti_bayar_dp_lunas')->nullable();
            $table->string('dp_status')->nullable();
            $table->string('status')->nullable();
            $table->string('tipe_pembayaran')->nullable();
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
        Schema::dropIfExists('pesanan');
    }
};

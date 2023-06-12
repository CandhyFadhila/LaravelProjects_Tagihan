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
        Schema::create('kelola_tagihan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tagihan');
            $table->string('bulan_tagihan');
            $table->enum('kategori_tagihan', ['Listrik', 'Air', 'Internet', 'Telephone']);
            $table->string('jumlah_tagihan');
            $table->string('total_tagihan');
            $table->string('tanggal_bayar');
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
        Schema::dropIfExists('kelola_tagihan');
    }
};

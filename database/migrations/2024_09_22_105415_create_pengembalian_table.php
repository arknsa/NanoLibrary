<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengembalianTable extends Migration
{
    public function up()
    {
        Schema::create('pengembalian', function (Blueprint $table) {
            $table->increments('ID_Pengembalian');
            $table->unsignedInteger('User_ID_User')->nullable();
            $table->unsignedInteger('Buku_ID_Buku')->nullable();
            $table->date('Tanggal_Pengembalian')->nullable();
            $table->date('Tanggal_Peminjaman')->nullable();
            $table->date('Tenggat_Pengembalian')->nullable();

            $table->foreign('User_ID_User')
                  ->references('ID_User')
                  ->on('user')
                  ->onDelete('set null');

            $table->foreign('Buku_ID_Buku')
                  ->references('ID_Buku')
                  ->on('buku')
                  ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengembalian');
    }
}


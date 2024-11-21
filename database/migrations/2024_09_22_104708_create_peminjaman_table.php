<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamanTable extends Migration
{
    public function up()
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->increments('ID_Peminjaman');
            $table->unsignedInteger('User_ID_User')->nullable();
            $table->unsignedInteger('Buku_ID_Buku')->nullable();
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
        Schema::dropIfExists('peminjaman');
    }
}
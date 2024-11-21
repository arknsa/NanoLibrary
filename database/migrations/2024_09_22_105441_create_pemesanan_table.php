<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesananTable extends Migration
{
    public function up()
    {
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->string('ID_Pemesanan', 8)->primary(); // Ubah kolom ID_Pemesanan menjadi string
            $table->unsignedInteger('User_ID_User')->nullable();
            $table->unsignedInteger('Buku_ID_Buku')->nullable();
            $table->date('Tanggal_Pemesanan')->nullable();

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
        Schema::dropIfExists('pemesanan');
    }
}


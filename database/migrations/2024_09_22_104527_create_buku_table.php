<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukuTable extends Migration
{
    public function up()
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->increments('ID_Buku');
            $table->string('Judul', 255);
            $table->string('Author', 100)->nullable();
            $table->string('Sampul', 255);
            $table->string('Deskripsi', 999);
            $table->string('Halaman', 255);
            $table->string('Penerbit', 255)->nullable();
            $table->integer('Tahun')->nullable();
            $table->integer('Berat')->nullable();
            $table->string('ISBN', 13)->nullable();
            $table->integer('Lebar')->nullable();
            $table->integer('Panjang')->nullable();
            $table->string('Bahasa', 255);
            $table->string('Kategori', 255);
            $table->integer('Stok')->default(0);
            $table->enum('Akses', ['Dapat dipinjam', 'Baca di tempat'])->default('Dapat dipinjam');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('buku');
    }
}

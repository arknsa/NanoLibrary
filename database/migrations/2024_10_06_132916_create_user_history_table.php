<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserHistoryTable extends Migration
{
    public function up()
    {
        Schema::create('user_histories', function (Blueprint $table) {
            $table->increments('id'); // ID untuk tabel ini
            $table->unsignedInteger('user_id'); // Menggunakan user_id sebagai foreign key
            $table->string('nama'); // Nama
            $table->string('nim'); // NIM
            $table->string('program_studi'); // Program studi
            $table->timestamp('entry_time')->nullable(); // Waktu masuk
            $table->timestamp('exit_time')->nullable(); // Waktu keluar
            $table->timestamp('entry_date')->nullable(); // Kolom baru untuk tanggal dengan waktu 00.00.00
            $table->timestamps();

            $table->foreign('user_id')
                ->references('ID_User')
                ->on('user')
                ->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists('user_histories'); // Fix the table name here
    }
}

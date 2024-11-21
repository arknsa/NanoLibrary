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
            $table->string('nama'); // Add this line for the `nama` column
            $table->string('nim'); // Add this line for the `nim` column
            $table->string('program_studi'); // Add this line for the `program_studi` column
            $table->timestamp('entry_time')->nullable();
            $table->timestamp('exit_time')->nullable();
            $table->timestamps();

            // Menetapkan foreign key
            $table->foreign('user_id')
                  ->references('ID_User')
                  ->on('user')
                  ->onDelete('cascade'); // Hapus entri ini ketika user dihapus
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_histories'); // Fix the table name here
    }
}
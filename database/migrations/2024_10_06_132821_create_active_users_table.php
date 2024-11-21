<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActiveUsersTable extends Migration
{
    public function up()
    {
        Schema::create('active_users', function (Blueprint $table) {
            $table->increments('id'); // ID untuk tabel ini
            $table->unsignedInteger('user_id'); // Menggunakan user_id sebagai foreign key
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
        Schema::dropIfExists('active_users');
    }
}
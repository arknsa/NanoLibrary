<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('ID_User');
            $table->string('NIM', 12)->nullable();
            $table->string('Nama', 100)->notNullable();
            $table->string('Email', 100)->unique()->notNullable();
            $table->string('Password', 255)->notNullable();
            $table->string('No_Telp', 15)->notNullable();
            $table->string('Role', 50)->default('mahasiswa')->notNullable();
            $table->integer('Angkatan')->nullable();
            $table->string('Program_Studi', 100)->nullable();
            // Optionally, you can add timestamps
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user');
    }
}

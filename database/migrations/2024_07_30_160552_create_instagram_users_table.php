<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstagramUsersTable extends Migration
{
    public function up()
    {
        Schema::create('instagram_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('iduser'); // Nombre correcto de la columna
            $table->string('username');
            $table->string('account_type');
            $table->integer('media_count');
            $table->timestamps();

            // Añadir la clave foránea correctamente
            $table->foreign('iduser')->references('iduser')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('instagram_users');
    }
}
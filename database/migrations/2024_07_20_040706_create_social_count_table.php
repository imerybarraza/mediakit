<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialCountTable extends Migration
{
    public function up()
    {
        Schema::create('social_count', function (Blueprint $table) {
            $table->id(); // Id de la tabla, auto-incremental
            $table->unsignedBigInteger('user_id'); // Clave foránea que referencia la tabla users
            $table->string('platform'); // Nombre de la plataforma (Facebook, Instagram, etc.)
            $table->string('social_id'); // ID social del usuario en la plataforma
            $table->string('access_token'); // Token de acceso
            $table->timestamps(); // Campos created_at y updated_at

            // Definir clave foránea
            $table->foreign('user_id')->references('iduser')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('social_count');
    }
}

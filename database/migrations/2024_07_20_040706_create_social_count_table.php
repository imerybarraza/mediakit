<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialCountTable extends Migration
{
    public function up()
    {
        Schema::create('social_count', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('user_id'); 
            $table->string('platform'); 
            $table->string('social_id'); 
            $table->string('access_token'); 
            $table->timestamps(); 

            // Definir clave foránea
            $table->foreign('user_id')->references('iduser')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('social_count');
    }
}

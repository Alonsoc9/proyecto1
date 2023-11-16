<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncryptedFilesTable extends Migration
{
    public function up()
    {
        Schema::create('encrypted_files', function (Blueprint $table) {
            $table->id();
            $table->string('filename');  // Nombre original del archivo encriptado
            $table->string('path');      // Ruta del archivo encriptado en el sistema de archivos
            $table->unsignedBigInteger('user_id');  // Clave foránea para relacionar con usuarios
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('encrypted_files');
    }
}


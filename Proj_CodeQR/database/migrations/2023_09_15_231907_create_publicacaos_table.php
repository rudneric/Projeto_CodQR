<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('publicacoes', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('video');
            $table->string('imagem');
            $table->Text('descricao')->nullable();
            $table->unsignedBigInteger('pubUserCodigo');
            $table->foreign('pubUserCodigo')->references('id')->on('users');
  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publicacoes');
    }
};

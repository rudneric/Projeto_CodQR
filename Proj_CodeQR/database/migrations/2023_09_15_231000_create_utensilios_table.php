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
        Schema::create('utensilios', function (Blueprint $table) {
            $table->id();
            $table->string('ute_nome', 50);
            $table->integer('ute_quantidade');
            $table->string('ute_resistencia', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utensilios');
    }
};

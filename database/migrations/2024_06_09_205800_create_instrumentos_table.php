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
        Schema::create('instrumentos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('ticker_usd');
            $table->string('ticker_ars'); 
            $table->integer('ratio');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operacion');
        Schema::dropIfExists('instrumentos');
    }
};

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
        Schema::create('inversion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("accion_id");
            $table->integer("cantidad"); 
            $table->double("cotizacion", 10); 
            $table->double("usd", 10); 
            $table->double("ars", 10); 
            $table->foreignId("cuenta_id")->references("id")->on("cuentas");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inversion');
    }
};

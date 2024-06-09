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
        Schema::create('operacion', function (Blueprint $table) {
            $table->id();
            $table->foreignId("instrumento_id")->references("id")->on("instrumentos");
            $table->date("fecha"); 
            $table->string("tipo")->default("C");
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
        
        Schema::dropIfExists('operacion');
    }
};

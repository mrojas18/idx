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
        Schema::table('inversion', function (Blueprint $table) {
            //
         
           $table->string('operacion'); 
           $table->dateTime('fecha');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inversion', function (Blueprint $table) {
            //
            $table->dropColumn(['operacion', 'fecha',]); 
        });
    }
};

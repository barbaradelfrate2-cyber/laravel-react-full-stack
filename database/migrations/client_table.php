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
        Schema::create('patient', function (Blueprint $table) {
            

            $table->id()->primary;
            $table->string('name');
            $table->string('surname');
            $table->string('indirizzo');
            $table->string('cap');
            $table->string('citta');
            $table->string('provincia');
            $table->string('codfisca')->unique;
            $table->string('mail');
            $table->foreignId('appointament_id');
            $table->foreignId('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient');
    }
};

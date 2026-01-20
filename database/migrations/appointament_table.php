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
        Schema::create('appointament', function (Blueprint $table) {
            
    $table->id();
    $table->string('type');
    $table->string('title'); 
    $table->text('description');
    $table->date('appointament_date'); 
    $table->time('appointament_time');
    $table->enum('status',['prenotato','confermato','cancellato']);
    $table->foreignId('user_id');
    $table->foreignId('patient_id');
    $table->text('mestamp')->nullable();
    $table->timestamps();

        
});
    }








    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
        Schema::dropIfExists('appointament');
    }
};

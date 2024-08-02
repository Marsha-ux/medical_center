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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignid('patient_id')->
            references('id')->on('patients')->onDelete('cascade');
            $table->foreignid('doctor_id')->
            references('id')->on('doctors')->onDelete('cascade');
            $table->date('date');
            $table->string('time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};

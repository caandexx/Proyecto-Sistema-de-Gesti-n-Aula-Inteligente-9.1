<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            
            // Fecha y horario
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            
            // Relaciones
            $table->foreignId('classroom_id')->constrained()->onDelete('cascade');
            $table->foreignId('subject_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('teacher_id')->nullable()->constrained()->onDelete('set null');
            
            // Estado y metadata
            $table->enum('status', ['pending', 'confirmed', 'cancelled'])->default('pending');
            $table->integer('attendees')->default(0);
            
            $table->timestamps();
            
            // Índices para optimización
            $table->index(['date', 'classroom_id']);
            $table->index(['teacher_id', 'date']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('classroom_id')->constrained()->onDelete('cascade');
            $table->foreignId('teacher_id')->constrained()->onDelete('cascade');
            $table->foreignId('subject_id')->constrained()->onDelete('cascade');
            $table->date('reservation_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->enum('status', ['pendiente', 'confirmada', 'cancelada'])->default('pendiente');
            $table->text('description')->nullable();
            $table->integer('student_count')->nullable();
            $table->string('recurrence')->nullable(); // única, semanal, mensual
            $table->timestamps();

            // Evitar reservas duplicadas en mismo horario y aula
            $table->unique(['classroom_id', 'reservation_date', 'start_time']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservations');
    }
};
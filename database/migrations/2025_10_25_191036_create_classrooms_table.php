<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('classrooms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('location');
            $table->integer('capacity');
            $table->text('description')->nullable();
            $table->string('status')->default('active');
            $table->json('features')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('classrooms');
    }
};
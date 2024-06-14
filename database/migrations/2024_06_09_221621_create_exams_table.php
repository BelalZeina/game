<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * course_id (Foreign Key, Integer, references Courses(course_id))
     */
    public function up(): void
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->foreignId("level_id")->constrained()->cascadeOnDelete();
            $table->foreignId("admin_id")->constrained()->cascadeOnDelete();
            $table->time('start_time');
            $table->time('end_time');
            $table->integer("time");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};

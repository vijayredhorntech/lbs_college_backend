<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacultyClassesTable extends Migration
{
    public function up()
    {
        Schema::create('faculty_classes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('faculty_id')->constrained()->onDelete('cascade');
            $table->foreignId('subject_id')->constrained()->onDelete('cascade');
            $table->time('class_time_start');
            $table->time('class_time_end');
            $table->json('class_days'); // Store days as JSON array
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('faculty_classes');
    }
}


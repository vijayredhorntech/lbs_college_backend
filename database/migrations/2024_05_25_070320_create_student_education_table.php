<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('student_education', function (Blueprint $table) {
            $table->id();
            $table->string('examination_name');
            $table->string('result');
            $table->string('year_month_of_passing');
            $table->string('roll_number');
            $table->string('board_university');
            $table->string('name_of_institution');
            $table->string('obtained_total_marks')->nullable();
            $table->string('cgpa')->nullable();
            $table->string('percentage')->nullable();
            $table->string('subjects');
            $table->foreignId('student_id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_education');
    }
};

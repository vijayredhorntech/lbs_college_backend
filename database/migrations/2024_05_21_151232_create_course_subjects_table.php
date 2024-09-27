<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('course_subjects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_schedule_id');
            $table->foreignId('subject_id');
            $table->boolean('is_optional');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('course_subjects');
    }
};

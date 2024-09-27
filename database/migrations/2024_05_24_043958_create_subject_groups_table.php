<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('subject_groups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_schedule_id')->constrained()->cascadeOnDelete();
            $table->json('course_subjects_id');
            $table->enum('name',['Group A','Group B','Group C','Group D'])->default('Group A');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subject_groups');
    }
};

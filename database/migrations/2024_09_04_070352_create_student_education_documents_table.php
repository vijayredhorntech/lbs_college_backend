<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('student_education_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id');
            $table->longText('examination_name');
            $table->text('result_awaited');
            $table->longText('roll_number');
            $table->longText('board_university');
            $table->longText('name_of_institute');
            $table->longText('obtained_total_marks')->nullable();
            $table->longText('cgpa')->nullable();
            $table->integer('percentage')->nullable();
            $table->longText('subjects');
            $table->longText('document');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_education_documents');
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
};

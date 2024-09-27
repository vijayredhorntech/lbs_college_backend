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
        Schema::create('student_dummies', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('course');
            $table->string('subject_group_name');
            $table->string('category');
            $table->string('Religion');
            $table->boolean('is_irdp')->default(false); // Assuming IRDP is a boolean field
            $table->string('phone_number');
            $table->string('email')->unique();
            $table->string('student_name');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->string('father_guardian_name');
            $table->date('dob'); // Date of birth
            $table->decimal('percentage_plus_two', 5, 2); // Assuming percentage with 2 decimal places
            $table->string('application_number');
            $table->string('roll_number');
            $table->date('enrolled_date');
            $table->string('university_roll_number')->nullable();
            $table->string('university_registration_number')->nullable();
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_dummies');
    }
};

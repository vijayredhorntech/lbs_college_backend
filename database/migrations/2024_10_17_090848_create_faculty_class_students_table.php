<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('faculty_class_students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('faculty_classes_id');
            $table->string('roll_number');
            $table->string('name');
            $table->string('phone')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('faculty_class_students');
    }
};

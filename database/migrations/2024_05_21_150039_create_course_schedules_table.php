<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('course_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id');
            $table->foreignId('academic_year_id');
            $table->longText('year');
            $table->date('submission_from');
            $table->date('submission_till');
            $table->date('fee_deposit_start');
            $table->date('fee_deposit_end');
            $table->date('late_fee_starts_from');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('course_schedules');
    }
};

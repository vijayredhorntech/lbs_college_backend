<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassAttendancesTable extends Migration
{
    public function up()
    {
        Schema::create('class_attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('faculty_class_id')->constrained()->onDelete('cascade');
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->boolean('attended')->default(false);
            $table->date('lecture_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('class_attendances');
    }
}

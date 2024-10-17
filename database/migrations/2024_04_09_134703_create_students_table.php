<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('photo')->nullable();
            $table->string('signature')->nullable();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('guardian_father_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('uni_roll_number')->nullable();
            $table->string('uni_registration_no')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('gender')->nullable();
            $table->string('alt_phone')->nullable();
            $table->string('father_phone')->nullable();
            $table->string('club_name')->nullable();
            $table->string('domicile')->nullable();
            $table->string('aadhar_number')->nullable();
            $table->string('pan_number')->nullable();
            $table->string('nationality')->nullable();
            $table->string('religion')->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('yearly_income')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('temp_address')->nullable();
            $table->boolean('is_expelled_before')->default(false);
            $table->string('expulsion_reason')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
    }
};

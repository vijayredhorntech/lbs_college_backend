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
            $table->string('last_name');
            $table->string('mother_name');
            $table->string('guardian_father_name');
            $table->string('email');
            $table->string('phone');
            $table->string('uni_roll_number')->nullable();
            $table->string('uni_registration_no')->nullable();
            $table->string('date_of_birth');
            $table->string('gender');
            $table->string('alt_phone')->nullable();
            $table->string('father_phone');
            $table->string('club_name')->nullable();
            $table->string('domicile');
            $table->string('aadhar_number');
            $table->string('pan_number')->nullable();
            $table->string('nationality');
            $table->string('religion');
            $table->string('father_occupation');
            $table->string('yearly_income');
            $table->string('permanent_address');
            $table->string('temp_address');
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

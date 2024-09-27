<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentDummy extends Model
{
    protected $fillable = [
        'course',
        'subject_group_name',
        'category',
        'Religion',
        'is_irdp',
        'phone_number',
        'email',
        'student_name',
        'gender',
        'father_guardian_name',
        'dob',
        'percentage_plus_two',
        'application_number',
        'roll_number',
        'enrolled_date',
        'university_roll_number',
        'university_registration_number',
    ];
    use HasFactory;
    
}

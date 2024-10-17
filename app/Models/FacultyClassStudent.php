<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FacultyClassStudent extends Model
{
    protected $fillable = [
        'faculty_classes_id',
        'roll_number',
        'name',
        'phone',
    ];

    public function facultyClasses(): BelongsTo
    {
        return $this->belongsTo(FacultyClasses::class);
    }

    public function attendances()
    {
        return $this->hasMany(ClassAttendance::class, 'student_id');
    }
}

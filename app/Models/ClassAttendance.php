<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClassAttendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'faculty_class_id',
        'student_id',
        'status',
        'lecture_date',
    ];

    protected $casts = [
        'lecture_date' => 'date',
    ];

    public function facultyClass(): BelongsTo
    {
        return $this->belongsTo(FacultyClasses::class);
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}

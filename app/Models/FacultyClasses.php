<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FacultyClasses extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject_id',
        'class_time_start',
        'class_time_end',
        'class_days',
        'faculty_id',
        'class_year',
    ];

    protected $casts = [
        'class_days' => 'array',
        'class_time_start' => 'datetime:H:i',
        'class_time_end' => 'datetime:H:i',
    ];


    public function faculty(): BelongsTo
    {
        return $this->belongsTo(Faculty::class);
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    public function attendances()
    {
        return $this->hasMany(ClassAttendance::class, 'faculty_class_id');
    }

    public function students()
    {
        return $this->hasMany(FacultyClassStudent::class, 'faculty_classes_id');
    }
}

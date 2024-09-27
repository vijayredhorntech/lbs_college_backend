<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubjectGroups extends Model
{
    protected $fillable = [
        'course_schedule_id',
        'course_subjects_id',
        'name',
    ];

    protected $casts = [
        'course_subjects_id' => 'array',
    ];


    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'subject_course_schedule', 'course_schedule_id', 'subject_id');
    }
}

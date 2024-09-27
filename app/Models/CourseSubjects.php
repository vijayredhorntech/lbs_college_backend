<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CourseSubjects extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_schedule_id',
        'subject_id',
        'is_optional',
    ];

    public function courseSchedule(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'course_schedule_id');
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }
}

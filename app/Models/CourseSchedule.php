<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CourseSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'academic_year_id',
        'year',
        'submission_from',
        'submission_till',
        'fee_deposit_start',
        'fee_deposit_end',
        'late_fee_starts_from',
    ];

    protected $casts = [
        'submission_from' => 'date',
        'submission_till' => 'date',
        'fee_deposit_start' => 'date',
        'fee_deposit_end' => 'date',
        'late_fee_starts_from' => 'date',
    ];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function academicYear(): BelongsTo
    {
        return $this->belongsTo(AcademicYear::class);
    }

    public function subjects()
    {
        return $this->hasMany(CourseSubjects::class, 'course_schedule_id');
    }

    public function groups()
    {
        return $this->hasMany(SubjectGroups::class, 'course_schedule_id');
    }
}

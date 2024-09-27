<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Enrollment extends Model
{
    use HasFactory;


    const STATUS_PENDING = 'pending';
    const STATUS_APPROVED = 'approved';
    const STATUS_REJECTED = 'rejected';
    const STATUS_UPDATE_REQUIRED = 'update_required';

    protected $fillable = [
        'student_id',
        'course_schedule_id',
        'enrollment_date',
        'elective_subjects',
        'status',
    ];

    protected $casts = [
        'enrollment_date' => 'date',
        'elective_subjects' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($enrollment) {
            $prefix = date('ym');
            $lastApplication = self::where('application_number', 'like', $prefix . '%')
                ->orderBy('application_number', 'desc')
                ->first();

            if ($lastApplication) {
                $lastSequenceNumber = (int) substr($lastApplication->application_number, -4);
                $newSequenceNumber = $lastSequenceNumber + 1;
            } else {
                $newSequenceNumber = 1111;
            }

            $newSequenceNumber = str_pad($newSequenceNumber, 4, '0', STR_PAD_LEFT);
            $enrollment->application_number = $prefix . $newSequenceNumber;
        });

        static::updating(function ($enrollment) {
            // Check if the status is changing
            if ($enrollment->isDirty('status')) {
                $statusHistory = new StatusHistory([
                    'enrollment_id' => $enrollment->id,
                    'status' => $enrollment->getOriginal('status'),
                    'notes' => 'Status changed from ' . $enrollment->getOriginal('status') . ' to ' . $enrollment->status,
                ]);
                $statusHistory->save();
            }
        });
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function courseSchedule(): BelongsTo
    {
        return $this->belongsTo(CourseSchedule::class);
    }

    public function statusHistories()
    {
        return $this->hasMany(StatusHistory::class);
    }
}

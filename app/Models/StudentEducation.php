<?php

namespace App\Models;

use App\Helpers\FileHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentEducation extends Model
{
    protected $fillable = [
        'examination_name',
        'result',
        'year_month_of_passing',
        'roll_number',
        'board_university',
        'name_of_institution',
        'obtained_total_marks',
        'cgpa',
        'percentage',
        'subjects',
        'student_id',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function getDocumentUrlAttribute()
    {
            return FileHelper::generateTemporarySignedUrl($this->document);
    }
}

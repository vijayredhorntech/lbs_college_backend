<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentEducationDocument extends Model
{


    protected  $fillable = [
        'student_id',
        'examination_name',
        'result_awaited',
        'roll_number',
        'board_university',
        'name_of_institute',
        'obtained_total_marks',
        'cgpa',
        'percentage',
        'subjects',
        'document',
    ];


    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}

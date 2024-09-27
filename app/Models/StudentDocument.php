<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentDocument extends Model
{
    protected $fillable = [
        'student_id',
        'document_name',
        'document_number',
        'document',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}

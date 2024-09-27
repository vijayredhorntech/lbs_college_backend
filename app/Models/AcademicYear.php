<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    use HasFactory;

    protected $fillable = [
        'year_start',
        'year_end',
    ];

    protected $casts = [
        'year_start' => 'date',
        'year_end' => 'date',
    ];
}

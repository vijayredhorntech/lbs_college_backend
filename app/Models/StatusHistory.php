<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'enrollment_id',
        'status',
        'notes',
    ];

    public function enrollment()
    {
        return $this->belongsTo(Enrollment::class);
    }
}

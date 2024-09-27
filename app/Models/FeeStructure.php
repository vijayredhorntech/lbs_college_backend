<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeeStructure extends Model
{
    protected $fillable = [
        'fund_name',
        'category',
        'amount',
    ];

    protected $casts = [
        'amount' => 'float',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Subject extends Model
{
    use HasFactory, HasSlug;

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    protected $fillable = [
        'name',
        'code',
        'description',
        'course_id',
    ];

    public function faculties()
    {
        return $this->belongsToMany(Faculty::class, 'faculty_subjects');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}

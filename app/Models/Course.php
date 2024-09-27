<?php

namespace App\Models;

use Dyrynda\Database\Support\GeneratesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Course extends Model
{
    use HasFactory, HasSlug, GeneratesUuid;

    protected $fillable = [
        'name',
        'description',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function schedule()
    {
        return $this->hasMany(CourseSchedule::class,'course_id');
    }

    public function currentSchedule()
    {
        return $this->hasOne(CourseSchedule::class,'course_id')->latest();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'date_of_joining',
        'address',
        'photo',
        'designation',
        'user_id'
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($faculty) {
            $user = $faculty->user()->create([
                'name' => $faculty->name,
                'email' => $faculty->email,
                'password' => bcrypt('password'),
            ])->assignRole('teacher');
            $faculty->update(['user_id' => $user->id]);
        });
    }

    protected $casts = [
        'date_of_joining' => 'date',
    ];

    public function getPhotoUrlAttribute()
    {
        return $this->photo ? asset('storage/' . $this->photo) : null;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'faculty_subjects');
    }

}

<?php

namespace App\Models;

use App\Helpers\FileHelper;
use Dyrynda\Database\Support\GeneratesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Student extends Model
{
    use HasFactory, GeneratesUuid;
        protected $fillable = [
            'user_id',
            'photo',
            'signature',
            'first_name',
            'last_name',
            'mother_name',
            'guardian_father_name',
            'email',
            'phone',
            'uni_roll_number',
            'uni_registration_no',
            'date_of_birth',
            'gender',
            'alt_phone',
            'father_phone',
            'club_name',
            'domicile',
            'aadhar_number',
            'pan_number',
            'nationality',
            'religion',
            'father_occupation',
            'yearly_income',
            'permanent_address',
            'temp_address',
            'is_expelled_before',
            'expulsion_reason',
        ];
    protected $casts = [
        'date_of_birth' => 'date',
    ];

// also create a user for student while creating and update the user while updating the student
    //boot
    protected static function boot()
    {
        parent::boot();
        static::updated(function ($student) {
            $student->user()->update([
                'name' => $student->first_name . ' ' . $student->last_name,
                'email' => $student->email,
            ]);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function studentEducationDocuments()
    {
        return $this->hasMany(StudentEducationDocument::class);
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
    public function getProfilePhotoAttribute()
    {
        if ($this->photo) {
            return FileHelper::generateTemporarySignedUrl($this->photo);
        }
        return asset('images/user.png');
    }

    public function getSignaturePhotoAttribute()
    {
        if ($this->signature) {
            return FileHelper::generateTemporarySignedUrl($this->signature);
        }
        return asset('images/signature.png');
    }

    public function enrollment()
    {
        return $this->hasMany(Enrollment::class, 'student_id');
    }

    public function education()
    {
        return $this->hasMany(StudentEducation::class, 'student_id');
    }

    public function documents()
    {
        return $this->hasMany(StudentDocument::class, 'student_id');
    }

    public function attendance()
    {
        return $this->hasMany(ClassAttendance::class, 'student_id');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'student_subjects', 'student_id', 'subject_id');
    }
}

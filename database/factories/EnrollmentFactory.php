<?php

namespace Database\Factories;

use App\Models\CourseSchedule;
use App\Models\Enrollment;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class EnrollmentFactory extends Factory
{
    protected $model = Enrollment::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'enrollment_date' => Carbon::now(),

            'student_id' => Student::factory(),
            'course_schedule_id' => CourseSchedule::factory(),
        ];
    }
}

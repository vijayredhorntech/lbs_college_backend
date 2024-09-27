<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\CourseSubjects;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CourseSubjectsFactory extends Factory
{
    protected $model = CourseSubjects::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'is_optional' => $this->faker->boolean(),

            'course_schedule_id' => Course::factory(),
            'subject_id' => Subject::factory(),
        ];
    }
}

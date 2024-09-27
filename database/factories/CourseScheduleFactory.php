<?php

namespace Database\Factories;

use App\Models\AcademicYear;
use App\Models\Course;
use App\Models\CourseSchedule;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CourseScheduleFactory extends Factory
{
    protected $model = CourseSchedule::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'year' => Carbon::now(),
            'submission_from' => Carbon::now(),
            'submission_till' => Carbon::now(),
            'fee_deposit_start' => Carbon::now(),
            'fee_deposit_end' => Carbon::now(),
            'late_fee_starts_from' => Carbon::now(),

            'course_id' => Course::factory(),
            'academic_year_id' => AcademicYear::factory(),
        ];
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $courses = [
            "B.A.",
            "B.C.A.",
            "B.Com.",
            "B.Sc. Life Science (Medical)",
            "B.Sc. Physical Science (Non-Medical)",
            "B.Voc. Retail Management",
            "B.Voc. Tourism & Hospitality",
            "M.A. English",
            "M.A. Hindi",
            "M.A. History",
            "M.A. Political Science",
            "M.Com.",
            "P.G.D.C.A."
        ];
        foreach ($courses as $course) {
            \App\Models\Course::create([
                'name' => $course,
                'description' => 'This is a description for ' . $course,
            ]);
        }
    }
}

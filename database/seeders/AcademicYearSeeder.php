<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AcademicYearSeeder extends Seeder
{
    public function run(): void
    {
        $academicYears = [
           [
               'year_start' => '2020-05-01',
                'year_end' => '2021-5-30',
           ],
              [
                'year_start' => '2021-05-01',
                 'year_end' => '2022-5-30',
              ],
              [
                'year_start' => '2022-05-01',
                 'year_end' => '2023-5-30',
              ],
              [
                'year_start' => '2023-05-01',
                 'year_end' => '2024-5-30',
              ],
              [
                'year_start' => '2024-05-01',
                 'year_end' => '2025-5-30',
              ]
        ];

        foreach ($academicYears as $academicYear) {
            \App\Models\AcademicYear::create($academicYear);
        }
    }
}

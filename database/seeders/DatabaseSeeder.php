<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Storage;
use Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            DashboardTableSeeder::class,

//            AnalyticsTableSeeder::class,
//            FintechTableSeeder::class,
//            CustomerSeeder::class,
//            OrderSeeder::class,
//            InvoiceSeeder::class,
//            MemberSeeder::class,
//            TransactionSeeder::class,
//            JobSeeder::class,
//            CampaignSeeder::class,
//            MarketerSeeder::class,
//            CampaignMarketerSeeder::class,
            RoleAndPermissionSeeder::class,
            AdminSeeder::class,
            CourseSeeder::class,
            AcademicYearSeeder::class,
            CourseScheduleSeeder::class,
        ]);
        \App\Models\Student::factory(100)->create()->each(function ($student) {
            $imageUrl = 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D';
            $fileContent = file_get_contents($imageUrl);
            $fileName = Str::random(40) . '.png';
            Storage::disk('private')->put('photos/' . $fileName, $fileContent);
            $student->update(['photo' => 'photos/' . $fileName]);
        });
        $subjects = array(
            "Hindi",
            "Sanskrit",
            "Economics",
            "History",
            "Sociology",
            "Physical Education",
            "Geography",
            "Music(V)",
            "Music(1)",
            "Philosophy",
            "Public Administration",
            "English",
            "Maths",
            "Political Science"
        );
        foreach ($subjects as $subject) {
            \App\Models\Subject::create([
                'name' => $subject,
                'code' => Str::random(5),
                'slug' => Str::slug($subject),
            ]);
        }
    }
}

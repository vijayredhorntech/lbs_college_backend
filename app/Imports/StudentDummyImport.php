<?php

namespace App\Imports;

use App\Models\StudentDummy;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;


class StudentDummyImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)

    {
        Log::info($row);
        $dob = $this->convertDate($row[10]);

        // Convert enrolled_date from 'DD-MM-YYYY' to 'YYYY-MM-DD' with error handling
        $enrolled_date = $this->convertDate($row[14]);

        return new StudentDummy([
           'course'                     => $row[0],
            'subject_group_name'         => $row[1],
            'category'                   => $row[2],
            'Religion'                   => $row[3],
            'is_irdp'                    => $row[4],
            'phone_number'               => $row[5],
            'email'                      => $row[6],
            'student_name'               => $row[7],
            'gender'                     => $row[8],
            'father_guardian_name'       => $row[9],
            'dob'                        =>$dob,
            'percentage_plus_two'        => $row[11],
            'application_number'         => $row[12],
            'roll_number'                => $row[13],
            'enrolled_date'              =>  $enrolled_date ,
            'university_roll_number'     => $row[15],
            'university_registration_number' => $row[16],
        
        ]);
    }
    private function convertDate($date)
    {
        try {
            // Attempt to convert the date using the expected format
            return Carbon::createFromFormat('d-m-Y', $date)->format('Y-m-d');
        } catch (\Exception $e) {
            // Log an error and return null if the date is invalid
            Log::error("Invalid date format: $date");
            return null; // or return a default value if you prefer
        }
    }

}


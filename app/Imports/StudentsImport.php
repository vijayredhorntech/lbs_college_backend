<?php

namespace App\Imports;

use App\Models\FacultyClassStudent;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentsImport implements ToModel
{
    protected $classId;

    public function __construct($classId)
    {
        $this->classId = $classId;
    }

    public function model(array $row)
    {
        return new FacultyClassStudent([
            'name' => $row[0], // Assuming name is in the first column
            'roll_number' => $row[1], // Assuming roll number is in the second column
            'faculty_classes_id' => $this->classId, // Use the passed class ID
            'phone' => null, // Add logic for phone if needed
        ]);
    }
}

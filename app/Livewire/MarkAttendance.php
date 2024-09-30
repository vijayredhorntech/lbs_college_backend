<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Student;
use App\Models\FacultyClasses;
use Masmerise\Toaster\Toastable;

class MarkAttendance extends Component
{
    use Toastable;
    public $facultyClass;
    public $students = [];
    public $attendance = [];
    public $selectedStudents = [];
    public $attendanceDate;

    public $presentCount = 0;
    public $absentCount = 0;

    public function fetchStudents()
    {
        $this->presentCount = 0;
        $this->absentCount = 0;
        // get all the students with their attendance for the faculty class, where student has subject of the faculty class
        $this->students = Student::whereHas('subjects', function ($query) {
            $query->where('subject_id', $this->facultyClass->subject_id);
        })->with(['attendance' => function ($query) {
            $query->where('faculty_class_id', $this->facultyClass->id)
                ->where('lecture_date', $this->attendanceDate);
        }])->get();

//        $this->students = Student::with(['attendance' => function ($query) {
//            $query->where('faculty_class_id', $this->facultyClass->id)
//                ->where('lecture_date', $this->attendanceDate);
//        }])->get();
        foreach ($this->students as $student) {
            $this->attendance[$student->id] = $student->attendance->first() ? ($student->attendance->first()->attended ? 'Present' : 'Absent') : 'Present';
            $this->presentCount += $student->attendance->first() ? ($student->attendance->first()->attended ? 1 : 0) : 1;
            $this->absentCount += $student->attendance->first() ? ($student->attendance->first()->attended ? 0 : 1) : 0;
        }

    }

    public function mount(FacultyClasses $facultyClass)
    {
        $this->facultyClass = $facultyClass;
        $this->attendanceDate = now()->format('Y-m-d');
        $this->fetchStudents();
    }

    public function markAttendance(Student $student, $status)
    {
//        // check if already marked for the same class and date then update the attendance
        $student->attendance()->updateOrCreate([
            'faculty_class_id' => $this->facultyClass->id,
            'lecture_date' => $this->attendanceDate,
        ], [
            'attended' => $status == 'Present' ? 1 : 0,
        ]);
        $this->success('Attendance marked successfully');
        $this->fetchStudents();
    }

    public function markSelected($status)
    {
        foreach ($this->selectedStudents as $studentId) {
            $student = Student::find($studentId);
            $this->markAttendance($student, $status);
        }
        $this->fetchStudents();
    }

    public function markAllExceptSelected($status)
    {
        foreach ($this->students as $student) {
            if (!in_array($student->id, $this->selectedStudents)) {
                $this->markAttendance($student, $status);
            }
        }
        $this->fetchStudents();
    }

    public function render()
    {
        return view('livewire.mark-attendance')->layout('layouts.app');
    }
}

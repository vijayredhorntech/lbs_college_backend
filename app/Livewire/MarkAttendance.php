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
    public $search = '';

    public $presentCount = 0;
    public $absentCount = 0;

    public function mount(FacultyClasses $facultyClass)
    {
        $this->facultyClass = $facultyClass;
        $this->attendanceDate = now()->format('Y-m-d');
        $this->fetchStudents();
    }

    public function fetchStudents()
    {
        $this->presentCount = 0;
        $this->absentCount = 0;

        // Fetch students based on the search query and the selected subject for the faculty class
        // Fetch students based on the subject ID and, optionally, search query
        $this->students = Student::whereHas('subjects', function ($query) {
            // The subject_id condition is always applied
            $query->where('subject_id', $this->facultyClass->subject_id);
        })
            ->when($this->search, function ($query) {
                // Apply search filter if a search term is entered
                $query->where(function ($query) {
                    $query->where('first_name', 'like', '%' . $this->search . '%')
                        ->orWhere('last_name', 'like', '%' . $this->search . '%')
                        ->orWhere('uni_roll_number', 'like', '%' . $this->search . '%');
                });
            })
            ->with(['attendance' => function ($query) {
                $query->where('faculty_class_id', $this->facultyClass->id)
                    ->where('lecture_date', $this->attendanceDate);
            }])
            ->get();
        // Initialize attendance array and count present/absent students
        foreach ($this->students as $student) {
            $this->attendance[$student->id] = $student->attendance->first() ? ($student->attendance->first()->attended ? 'Present' : 'Absent') : 'Present';
            $this->presentCount += $student->attendance->first() ? ($student->attendance->first()->attended ? 1 : 0) : 1;
            $this->absentCount += $student->attendance->first() ? ($student->attendance->first()->attended ? 0 : 1) : 0;
        }
    }

    public function searchStudents()
    {
        $this->fetchStudents();
    }

    public function markAttendance(Student $student, $status)
    {
        // Update or create attendance record
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

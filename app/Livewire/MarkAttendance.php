<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Student;
use App\Models\FacultyClasses;
use App\Models\ClassAttendance;
use App\Models\FacultyClassStudent;
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
    public $leaveCount = 0;

    protected $listeners = ['studentAdded' => 'fetchStudents'];

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
        $this->leaveCount = 0;

        // Fetch students based on the search query and the selected subject for the faculty class
        $this->students = $this->facultyClass->students()
            ->when($this->search, function ($query) {
                // Apply search filter if a search term is entered
                $query->where(function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('roll_number', 'like', '%' . $this->search . '%');
                });
            })
            ->get();
            
        // Initialize attendance array and count present/absent/leave students
        foreach ($this->students as $student) {
            // Get attendance record for this student
            $attendanceRecord = ClassAttendance::where('faculty_class_id', $this->facultyClass->id)
                ->where('student_id', $student->id)
                ->where('lecture_date', $this->attendanceDate)
                ->first();
                
            $this->attendance[$student->id] = $attendanceRecord ? $attendanceRecord->status : 'present';
            
            if ($attendanceRecord) {
                if ($attendanceRecord->status === 'present') {
                    $this->presentCount++;
                } elseif ($attendanceRecord->status === 'absent') {
                    $this->absentCount++;
                } elseif ($attendanceRecord->status === 'leave') {
                    $this->leaveCount++;
                }
            } else {
                $this->presentCount++;
            }
        }
    }

    public function searchStudents()
    {
        $this->fetchStudents();
    }

    public function markAttendance($studentId, $status)
    {
        // Get the student
        $student = FacultyClassStudent::find($studentId);
        
        if (!$student) {
            $this->error('Student not found');
            return;
        }
        
        // Update or create attendance record
        ClassAttendance::updateOrCreate([
            'faculty_class_id' => $this->facultyClass->id,
            'student_id' => $student->id,
            'lecture_date' => $this->attendanceDate,
        ], [
            'status' => $status,
        ]);
        
        $this->success('Attendance marked successfully');
        $this->fetchStudents();
    }

    public function markSelected($status)
    {
        foreach ($this->selectedStudents as $studentId) {
            $this->markAttendance($studentId, $status);
        }
        $this->fetchStudents();
    }

    public function markAllExceptSelected($status)
    {
        foreach ($this->students as $student) {
            if (!in_array($student->id, $this->selectedStudents)) {
                $this->markAttendance($student->id, $status);
            }
        }
        $this->fetchStudents();
    }

    public function render()
    {
        return view('livewire.mark-attendance')->layout('layouts.app');
    }
}

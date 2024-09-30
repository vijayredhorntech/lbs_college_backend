<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\ClassAttendance;
use App\Models\FacultyClasses;
use Carbon\Carbon;

class AttendanceReport extends Component
{
    public $facultyClass;
    public $attendanceData = [];
    public $searchTerm = '';
    public $selectedMonth = '';

    public function mount(FacultyClasses $facultyClass)
    {
        $this->facultyClass = $facultyClass;
        $this->fetchAttendanceData();
    }

    public function fetchAttendanceData()
    {
        // Fetch attendance records based on the faculty class id
        $query = $this->facultyClass->attendances()->with('student', 'facultyClass.subject');

        // If search term is provided, filter the query
        if ($this->searchTerm) {
            $query->whereHas('student', function($q) {
                $q->where('first_name', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('last_name', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('uni_roll_number', 'like', '%' . $this->searchTerm . '%');
            });
        }

        // If a month is selected, filter by the selected month
        if ($this->selectedMonth) {
            $query->whereMonth('lecture_date', $this->selectedMonth);
        }

        // Group attendance data by student_id
        $this->attendanceData = $query->get();
    }

    public function searchAttendance()
    {
        // Re-fetch attendance data based on the search term and selected month
        $this->fetchAttendanceData();
    }

    public function render()
    {
        return view('livewire.attendance-report', [
            'attendanceData' => $this->attendanceData,
            'uniqueDays' => $this->getUniqueAttendanceDays(),
        ])->layout('layouts.app');
    }

    private function getUniqueAttendanceDays()
    {
        return collect($this->attendanceData->groupBy('student_id'))
            ->flatMap(function ($studentAttendance) {
                return collect($studentAttendance)->pluck('lecture_date')->map->format('Y-m-d');
            })
            ->unique()
            ->values()
            ->toArray();
    }
}

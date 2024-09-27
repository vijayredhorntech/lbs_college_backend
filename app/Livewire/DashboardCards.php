<?php

namespace App\Livewire;

use App\Models\Student;
use App\Models\Faculty;
use App\Models\Course;
use App\Models\Subject;
use App\Models\Enrollment;
use Livewire\Component;

class DashboardCards extends Component
{
    public $studentCount;
    public $facultyCount;
    public $courseCount;
    public $subjectCount;
    public $enrollmentCount;

    public function mount()
    {
        $this->studentCount = Student::count();
        $this->facultyCount = Faculty::count();
        $this->courseCount = Course::count();
        $this->subjectCount = Subject::count();
        $this->enrollmentCount = Enrollment::count();
    }

    public function render()
    {
        return view('livewire.dashboard-cards');
    }
}

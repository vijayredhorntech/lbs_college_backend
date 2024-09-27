<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;

class StudentProfile extends Component
{
    public $student;
    public $enrollments;
    public function mount(Student $student)
    {
        $this->student = $student;
    }
    public function render()
    {
        return view('livewire.student-profile')->layout('layouts.app');
    }
}

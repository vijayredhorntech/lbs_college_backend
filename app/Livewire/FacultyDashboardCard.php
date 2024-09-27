<?php

namespace App\Livewire;

use App\Models\Faculty;
use Livewire\Component;

class FacultyDashboardCard extends Component
{
    public $facultyId;
    public $faculty;
    public $subjects;

    public function mount($facultyId = null)
    {
        // If no facultyId is provided, use the current authenticated user's faculty
        if ($facultyId) {
            $this->facultyId = $facultyId;
        } else {
            $this->facultyId = auth()->user()->faculty->id; // Adjust according to your user model
        }

        $this->loadFacultyData();
    }

    public function loadFacultyData()
    {
        $this->faculty = Faculty::with('subjects')->find($this->facultyId);

        if ($this->faculty) {
            $this->subjects = $this->faculty->subjects;
        } else {
            $this->subjects = [];
        }
    }

    public function render()
    {
        return view('livewire.faculty-dashboard-card');
    }
}

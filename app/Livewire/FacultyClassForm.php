<?php

namespace App\Livewire;

use App\Models\Faculty;
use App\Models\FacultyClasses;
use App\Models\Subject;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class FacultyClassForm extends Component
{
    public $facultyClassId;
    public $subjectId;
    public $classTimeStart;
    public $classTimeEnd;
    public $classDays = [];
    public $facultyId;
    public $classYear;

    public $subjects = [];
    public $faculties = [];
    public $classYearOptions = ['1st Year', '2nd Year', '3rd Year', 'Semester 1', 'Semester 2', 'Semester 3', 'Semester 4', 'Semester 5', 'Semester 6'];

    public $isEditMode = false;

    public function mount($facultyClass = null)
    {
        if ($facultyClass) {
            $facultyClass = FacultyClasses::find($facultyClass);
            $this->isEditMode = true;
            $this->facultyClassId = $facultyClass->id;
            $this->subjectId = $facultyClass->subject_id;
            $this->classTimeStart = $facultyClass->class_time_start;
            $this->classTimeEnd = $facultyClass->class_time_end;
            $this->classDays = $facultyClass->class_days;
            $this->facultyId = $facultyClass->faculty_id;
            $this->classYear = $facultyClass->class_year;
        }

        if (Auth::user()->hasRole('admin')) {
            $this->faculties = Faculty::all();
        } else {
            $this->faculties = Faculty::where('user_id', Auth::id())->get();
        }

        // Initialize subjects list
        $this->updateSubjects();
    }

    public function getFaculties($value)
    {
        $this->updateSubjects();
        $this->updateClassTimes();
    }

    public function updateSubjects()
    {
        if ($this->facultyId) {
            $faculty = Faculty::find($this->facultyId);
            $this->subjects = $faculty ? $faculty->subjects : [];
        } else {
            $this->subjects = [];
        }
    }

    public function updateClassTimes()
    {
        // Assuming you have a method to get class times based on faculty ID
        if ($this->facultyId) {
            $faculty = Faculty::find($this->facultyId);
            if ($faculty) {
                $this->classTimeStart = $faculty->default_class_time_start ?? '09:00';
                $this->classTimeEnd = $faculty->default_class_time_end ?? '17:00';
            }
        }
    }

    public function render()
    {
        return view('livewire.faculty-class-form')->layout('layouts.app', ['header' => 'Create Class']);
    }

    public function save()
    {
        $this->validate([
            'subjectId' => 'required|exists:subjects,id',
            'classTimeStart' => 'required|date_format:H:i',
            'classTimeEnd' => 'required|date_format:H:i',
            'classDays' => 'required|array',
            'facultyId' => 'required|exists:faculties,id',
            'classYear' => 'nullable|string',
        ]);

        FacultyClasses::updateOrCreate(
            ['id' => $this->facultyClassId],
            [
                'subject_id' => $this->subjectId,
                'class_time_start' => $this->classTimeStart,
                'class_time_end' => $this->classTimeEnd,
                'class_days' => $this->classDays,
                'faculty_id' => $this->facultyId,
                'class_year' => $this->classYear,
            ]
        );

        session()->flash('message', $this->isEditMode ? 'Class updated successfully.' : 'Class created successfully.');
        $this->reset(['facultyClassId', 'subjectId', 'classTimeStart', 'classTimeEnd', 'classDays', 'facultyId', 'classYear']);
    }

}


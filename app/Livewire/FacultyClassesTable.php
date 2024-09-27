<?php
namespace App\Livewire;

use App\Models\FacultyClasses;
use App\Models\Faculty;
use App\Models\Subject;
use Livewire\Component;
use Livewire\WithPagination;

class FacultyClassesTable extends Component
{
    use WithPagination;

    public $search = '';
    public $editMode = false;
    public $selectedClass;
    public $selectedFaculty;
    public $faculties;
    public $subjects;

    protected $rules = [
        'selectedFaculty' => 'required|exists:faculties,id',
        'subjects' => 'required|array',
    ];

    public function mount()
    {
        $this->faculties = Faculty::all();
    }

    public function render()
    {
        $query = FacultyClasses::query()
            ->with('faculty', 'subject')
            ->where(function($query) {
                $query->whereHas('faculty', function($q) {
                    $q->where('name', 'like', '%' . $this->search . '%');
                })
                    ->orWhereHas('subject', function($q) {
                        $q->where('name', 'like', '%' . $this->search . '%');
                    });
            });

        if (auth()->user()->hasRole('admin') && $this->selectedFaculty) {
            $query->where('faculty_id', $this->selectedFaculty);
        } else if (!auth()->user()->hasRole('admin')) {
            $query->where('faculty_id', auth()->user()->faculty->id);
        }

        $classes = $query->paginate(10);

        return view('livewire.faculty-classes-table', [
            'classes' => $classes,
        ]);
    }

    public function updatedSelectedFaculty($facultyId)
    {
        $this->subjects = Subject::whereHas('faculties', function ($query) use ($facultyId) {
            $query->where('id', $facultyId);
        })->get();
    }

    public function edit($id)
    {
        // Find the selected class by ID or fail
        $this->selectedClass = FacultyClasses::findOrFail($id);

        // Set edit mode to true
        $this->editMode = true;

        // Set selected faculty ID
        $this->selectedFaculty = $this->selectedClass->faculty_id;

        // Fetch subjects related to the selected faculty
        $this->subjects = Subject::whereHas('faculties', function ($query) {
            $query->where('faculties.id', $this->selectedFaculty);
        })->get();
    }

    public function delete($id)
    {
        FacultyClasses::destroy($id);
        session()->flash('message', 'Class deleted successfully.');
    }

    public function resetFilters()
    {
        $this->search = '';
        $this->selectedFaculty = null;
        $this->subjects = [];
    }
}

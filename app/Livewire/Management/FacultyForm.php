<?php
namespace App\Livewire\Management;

use App\Models\Faculty;
use App\Models\Subject;
use Livewire\Component;
use Livewire\WithFileUploads;
use Masmerise\Toaster\Toastable;

class FacultyForm extends Component
{
    use Toastable, WithFileUploads;

    public $faculty = null;
    public $form = [
        'name' => '',
        'phone' => '',
        'designation' => '',
        'email' => '',
        'date_of_joining' => '',
        'address' => '',
        'photo' => null,
    ];
    public $allSubjects; // To store all available subjects
    public $selectedSubjects = []; // To store selected subjects

    public function mount($faculty = null)
    {
        $this->allSubjects = Subject::all(); // Load all subjects

        $faculty = $faculty ? Faculty::find($faculty) : null;
        if ($faculty) {
            $this->faculty = $faculty;
            $this->form = $faculty->toArray();
            // Load existing subjects for editing
            $this->selectedSubjects = $faculty->subjects->pluck('id')->toArray();
        }
    }

    public function render()
    {
        return view('livewire.management.faculty-form')->layout('layouts.app');
    }

    public function save()
    {
        $this->validate([
            'form.name' => 'required|string|max:255',
            'form.phone' => 'required|string|max:15',
            'form.email' => 'required|email|unique:faculties,email,' . optional($this->faculty)->id,
            'form.date_of_joining' => 'nullable|date',
            'form.designation' => 'required|string|max:255',
            'form.address' => 'required|string|max:255',
            'form.photo' => 'nullable|image|max:1024', // 1MB Max
            'selectedSubjects' => 'array', // Validate selected subjects
        ]);

        if ($this->form['photo']) {
            $photoPath = $this->form['photo']->store('photos', 'public');
            $this->form['photo'] = $photoPath;
        }

        if ($this->faculty) {
            $this->faculty->update($this->form);
        } else {
            $this->faculty = Faculty::create($this->form);
        }

        // Sync subjects
        $this->faculty->subjects()->sync($this->selectedSubjects);

        $this->success('Faculty saved successfully');
        return redirect()->route('faculty-list');
    }
}

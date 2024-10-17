<?php
namespace App\Livewire;

use App\Models\FacultyClassStudent;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StudentsImport;

class FacultyClassStudentForm extends ModalComponent
{
    use WithFileUploads;

    public $name;
    public $roll_number;
    public $successMessage; // Property for success message
    public $classId; // Property to store class ID
    public $excelFile; // Property for uploaded Excel file

    // Mount method to receive the class ID
    public function mount($classId = null)
    {
        $this->classId = $classId; // Assign the class ID
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'roll_number' => 'required|string|max:255',
        ]);

        FacultyClassStudent::create([
            'name' => $this->name,
            'roll_number' => $this->roll_number,
            'faculty_classes_id' => $this->classId, // Use the passed class ID
            'phone' => null, // Add logic for phone if needed
        ]);

        // Reset fields after submission
        $this->reset(['name', 'roll_number']);

        // Set success message
        $this->successMessage = 'Student saved successfully!';

        // Optional: Clear success message after a delay
        $this->dispatch('clearSuccessMessage', ['message' => $this->successMessage]);

        // Optionally, trigger a re-render of the component
        $this->dispatch('studentAdded');
    }

    public function upload()
    {
        $this->validate([
            'excelFile' => 'required|file|mimes:xlsx,xls', // Validate file type
        ]);

        // Import the students from the Excel file
        Excel::import(new StudentsImport($this->classId), $this->excelFile);

        // Reset the excelFile property
        $this->excelFile = null;

        // Set success message
        $this->successMessage = 'Students imported successfully!';

        // Optional: Clear success message after a delay
        $this->dispatch('clearSuccessMessage', ['message' => $this->successMessage]);
    }

    public function render()
    {
        return view('livewire.faculty-class-student-form');
    }

    public function resetSuccessMessage()
    {
        $this->successMessage = null; // Reset the success message
    }
}

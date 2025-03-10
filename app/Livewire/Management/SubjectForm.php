<?php

namespace App\Livewire\Management;

use App\Models\Course;
use App\Models\Subject;
use Livewire\Component;
use Masmerise\Toaster\Toastable;

class SubjectForm extends Component
{
    use Toastable;
    public $subject = null;
    public $form = [
        'name' => '',
        'code' => '',
        'description' => '',
        'course_id' => null,
    ];
    
    public $courses = [];

    public function mount($subject = null)
    {
        $this->courses = Course::all();
        
        $subject = $subject ? Subject::find($subject) : null;
        if ($subject) {
            $this->subject = $subject;
            $this->form = $subject->toArray();
        }
    }
    
    public function render()
    {
        return view('livewire.management.subject-form')->layout('layouts.app');
    }
    
    public function save(){
        $this->validate([
            'form.name' => 'required|unique:subjects,name,' . optional($this->subject)->id,
            'form.code' => 'required',
            'form.description' => 'nullable',
            'form.course_id' => 'nullable|exists:courses,id',
        ]);
        
        if ($this->subject) {
            $this->subject->update($this->form);
        } else {
            \App\Models\Subject::create($this->form);
        }
        
        $this->success('Subject saved successfully');
        return redirect()->route('subject-list');
    }
}

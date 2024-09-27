<?php

namespace App\Livewire\Management;

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
    ];

    public function mount($subject = null)
    {
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

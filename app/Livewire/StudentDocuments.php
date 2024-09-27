<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Masmerise\Toaster\Toastable;

class StudentDocuments extends Component
{
    use Toastable, WithFileUploads;
    public $documentTypes = [
        'National ID',
        'Aadhar Card',
        'PAN Card',
        'Voter ID',
        'Passport',
        'Birth Certificate',
        'Other',
        "Matric Marks Sheet",
        "10+2 Marks Sheet",
        "Character certificate in original of the institution last attended",
        "Original migration certificate if other than HP board",
        "Bonafide Certificate",
        "Category Certificate (SC/ST/OBC/EWS/Minority Community)",
        "Certificate of IRDP/BPL/PH/WFF/ExMan/WES & Others",
        "Physical Challenged if yes attach certificates",
        "Certificate of Single Girl Child"
    ];
    public $form = [];
    public function mount(){
        $student = auth()->user()->student;
        if($student->documents()->exists()){
            $this->form = $student->documents->toArray();
        } else{
            $this->form = [
                [
                    'document_name' => '',
                    'document_number' => '',
                    'document' => '',
                    'student_id' => auth()->user()->student->id,
                ]
            ];
        }
    }

    public function addForm(){
        $this->form[] = [
            'document_name' => '',
            'document_number' => '',
            'document' => '',
            'student_id' => auth()->user()->student->id,
        ];
    }

    public function removeForm($index){
        // remove from db
        if(isset($this->form[$index]['id'])){
            \Storage::disk('private')->delete($this->form[$index]['document']);
            \App\Models\StudentDocument::find($this->form[$index]['id'])->delete();
        }
        unset($this->form[$index]);
        $this->form = array_values($this->form);
    }
    public function submitForm(){
        $this->validate([
            'form.*.document_name' => 'required',
            'form.*.document_number' => 'required',
            'form.*.document' => 'required',
        ]);
        foreach($this->form as $key => $value){
            if(isset($value['id'])){
                \Storage::disk('private')->delete($value['document']);
//                $value['document'] = $value['document']->store('documents','private');
                $document = \App\Models\StudentDocument::find($value['id']);
                $document->update($value);
            } else{
                $value['document'] = $value['document']->store('documents','private');
                \App\Models\StudentDocument::create($value);
            }
        }
        $this->success( 'Documents saved successfully');
    }
    public function render()
    {
        return view('livewire.student-documents')->layout('layouts.app');
    }
}

<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Masmerise\Toaster\Toastable;

class StudentEducation extends Component
{
    use WithFileUploads, Toastable;
    public $form = [];

    public function mount(){
        $student = auth()->user()->student;
        if($student->education()->exists()){
            $this->form = $student->education->toArray();
        } else{
            $this->form = [
                [
                    'examination_name'=>'',
                    'result'=>'',
                    'year_month_of_passing'=>'',
                    'roll_number'=>'',
                    'board_university'=>'',
                    'name_of_institution'=>'',
                    'obtained_total_marks'=>'',
                    'cgpa'=>'',
                    'percentage'=>'',
                    'subjects'=>'',
                    'student_id' => auth()->user()->student->id,
                ]
            ];
        }
    }
    public function addForm(){
        $this->form[] = [
            'examination_name'=>'',
            'result'=>'',
            'year_month_of_passing'=>'',
            'roll_number'=>'',
            'board_university'=>'',
            'name_of_institution'=>'',
            'obtained_total_marks'=>'',
            'cgpa'=>'',
            'percentage'=>'',
            'subjects'=>'',
            'student_id' => auth()->user()->student->id,
        ];
    }

    public function removeForm($index){
        unset($this->form[$index]);
        $this->form = array_values($this->form);
    }

    public function render()
    {
        return view('livewire.student-education')->layout('layouts.app');
    }

    public function submitForm(){

        foreach($this->form as $key => $value){
            if(isset($value['id'])){
//                \Storage::disk('private')->delete($value['document']);
//                $value['document'] = $value['document']->store('documents','private');
                $document = \App\Models\StudentEducation::find($value['id']);
                $document->update($value);
            } else{
//                $value['document'] = $value['document']->store('documents','private');
                \App\Models\StudentEducation::create($value);
            }
        }
        $this->success('Documents added successfully');

    }
}

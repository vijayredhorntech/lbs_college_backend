<?php

namespace App\Livewire;

use App\Models\StudentEducationDocument;
use Illuminate\Http\UploadedFile;
use Livewire\Component;
use Livewire\WithFileUploads;
use Masmerise\Toaster\Toastable;

class StudentEducationDocuments extends Component
{
    use WithFileUploads, Toastable;

    public $form = [];
    public $isEdit = false;

    public function mount($id = null)
    {

        if ($id){
            $studentDocument = StudentEducationDocument::find($id);

            $this->isEdit = true;
            $this->form = [
                [
                    'document_id' => $studentDocument->id,
                    'examination_name' => $studentDocument->examination_name,
                    'result' => $studentDocument->result,
                    'year_month_of_passing' => $studentDocument->year_month_of_passing,
                    'roll_number' => $studentDocument->roll_number,
                    'board_university' => $studentDocument->board_university,
                    'name_of_institute' => $studentDocument->name_of_institute,
                    'obtained_total_marks' => $studentDocument->obtained_total_marks,
                    'cgpa' => $studentDocument->cgpa,
                    'percentage' => $studentDocument->percentage,
                    'subjects' => $studentDocument->subjects,
                    'student_id' => auth()->user()->id,
                    'document' => $studentDocument->document,
                ]
            ];
        }
        else{
            $this->form = [
                [
                    'document_id' => '',
                    'examination_name' => '',
                    'result' => '',
                    'year_month_of_passing' => '',
                    'roll_number' => '',
                    'board_university' => '',
                    'name_of_institute' => '',
                    'obtained_total_marks' => '',
                    'cgpa' => '',
                    'percentage' => '',
                    'subjects' => '',
                    'student_id' => auth()->user()->id,
                    'document' => '',
                ]
            ];
        }




    }

    public function addForm()
    {
        $this->form[] = [
            'student_id' => 1,
            'examination_name' => '',
            'result_awaited' => '',
            'roll_number' => '',
            'board_university' => '',
            'name_of_institute' => '',
            'obtained_total_marks' => '',
            'cgpa' => '',
            'percentage' => '',
            'subjects' => '',
            'document' => '',
        ];
    }

    public function removeForm($index)
    {
        unset($this->form[$index]);
        $this->form = array_values($this->form);
    }

    public function render()
    {
        return view('livewire.student-education-documents')->layout('layouts.app');
    }

    public function submitForm()
    {
        foreach ($this->form as $key => $value) {
            if (isset($value['document']) && $value['document'] instanceof \Illuminate\Http\UploadedFile) {
                $value['document'] = $value['document']->store('documents', 'public');
            }

            StudentEducationDocument::create($value);
        }

        $this->success('Documents added successfully');
        return redirect()->route('student_education_documents');

    }

    public function updateForm(){
        $studentDocument = StudentEducationDocument::find($this->form[0]['document_id']);

        // check if there is document uploaded
         if (isset($this->form[0]['document']) && $this->form[0]['document'] instanceof UploadedFile) {
            $this->form[0]['document'] = $this->form[0]['document']->store('documents', 'public');
        }
        $studentDocument->update($this->form[0]);
        $this->success('Documents updated successfully');

        return redirect()->route('student_education_documents');



    }

}

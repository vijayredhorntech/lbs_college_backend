<?php

namespace App\Livewire\Management;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithFileUploads;
use Masmerise\Toaster\Toastable;
use Storage;

class CourseForm extends Component
{
    use WithFileUploads;
    use Toastable;

    public $form = [
        'name' => '',
        'description' => '',
        'title_image' => null,
        'subjects' => [],
    ];

    public $course = null;

    public function mount( $course = null)
    {
        $course = $course ? Course::whereSlug($course)->get()->first() : null;
        if ($course) {
            $this->course = $course;
            $this->form = $course->toArray();
//            $this->form['subjects'] = $course->subjects->pluck('id')->toArray();
        }
    }

    public function render()
    {
        $subjects = \App\Models\Subject::all();
        return view('livewire.management.course.form')->layout('layouts.app')->with('subjects', $subjects);
    }

    public function save()
    {
        $this->validate([
            'form.name' => 'required',
            'form.description' => 'nullable',
//            'form.title_image' => 'nullable|image|max:1024',
        ], [
            'form.name.required' => 'Name is required',
//            'form.title_image.image' => 'Title image must be an image',
//            'form.title_image.max' => 'Title image must be less than 1MB',
        ]);
//        if ($this->form['title_image']) {
//            $this->form['title_image'] = $this->form['title_image']->store('courses', 'private');
//        }

        $this->course ? $this->course->update($this->form) : Course::create($this->form);

        $this->success('Course saved successfully');

        $this->reset('form');
        return redirect()->route('course-list');
    }

}


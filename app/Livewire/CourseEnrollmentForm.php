<?php

namespace App\Livewire;

use App\Models\CourseSchedule;
use App\Models\Student;
use Livewire\Component;
use Masmerise\Toaster\Toastable;

class CourseEnrollmentForm extends Component
{
    use Toastable;
    public Student $student;
    public CourseSchedule $schedule;
    public $selectedSubjects = [];
    public $totalFee;

    public function mount(Student $student,CourseSchedule $schedule)
    {
        $this->student = $student;
        $this->schedule = $schedule;
        $this->totalFee = \App\Models\FeeStructure::where('category','ANNUAL CHARGES')->pluck('amount')->sum();
    }

    public function submit()
    {
        //check if student already enrolled
        if($this->student->enrollment()->where('course_schedule_id',$this->schedule->id)->exists()){
            $this->error('Student already enrolled');
            return;
        }
        $this->student->enrollment()->create([
            'course_schedule_id' => $this->schedule->id,
            'enrollment_date' => now(),
            'elective_subjects' => $this->selectedSubjects,
        ]);
        $this->success( 'Enrollment successful');
        $this->redirect(route('enrollment-list'));

        // Validate that exactly 2 subjects are selected
//        if (count($this->selectedSubjects) !== 2) {
//            session()->flash('error', 'You must select exactly 2 subjects.');
//            return;
//        }
//
//        // Ensure only one subject per group
//        $groups = $this->schedule->groups->groupBy('name');
//        $groupSubjectCount = [];
//
//        foreach ($this->selectedSubjects as $subjectId) {
//            foreach ($groups as $groupName => $group) {
//                foreach ($group as $course) {
//                    if (in_array($subjectId, $course->course_subjects_id)) {
//                        if (!isset($groupSubjectCount[$groupName])) {
//                            $groupSubjectCount[$groupName] = 0;
//                        }
//                        $groupSubjectCount[$groupName]++;
//                        break 2;
//                    }
//                }
//            }
//        }
//
//        foreach ($groupSubjectCount as $count) {
//            if ($count > 1) {
//                session()->flash('error', 'You can select only one subject per group.');
//                return;
//            }
//        }
//
//        // Handle the selected subjects, e.g., save to the database
//        $this->student->subjects()->sync($this->selectedSubjects);
//
//        // Optional: Add a success message or redirect
//        session()->flash('message', 'Subjects successfully enrolled.');




    }
    public function render()
    {
        return view('livewire.course-enrollment-form')->layout('layouts.app');
    }
}

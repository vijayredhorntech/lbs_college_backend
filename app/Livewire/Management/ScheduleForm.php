<?php

namespace App\Livewire\Management;

use App\Models\AcademicYear;
use App\Models\Course;
use App\Models\CourseSchedule;
use App\Models\Subject;
use Livewire\Component;
use Masmerise\Toaster\Toastable;

class ScheduleForm extends Component
{
    use Toastable;
    public $form = [
        'course_id' => '',
        'academic_year_id' => '',
        'year' => '',
        'submission_from' => '',
        'submission_till' => '',
        'fee_deposit_start' => '',
        'fee_deposit_end' => '',
        'late_fee_starts_from' => '',
        'subjects' => [],
        'groups' => [],
    ];
    public $schedule;
    public function mount($schedule = null)
    {
        $this->schedule = $schedule ? CourseSchedule::find($schedule) : null;
        if ($schedule) {
            $this->form = [
                'course_id' => $this->schedule->course_id,
                'academic_year_id' => $this->schedule->academic_year_id,
                'year' => $this->schedule->year,
                'submission_from' => $this->schedule->submission_from->format('Y-m-d'),
                'submission_till' => $this->schedule->submission_till->format('Y-m-d'),
                'fee_deposit_start' => $this->schedule->fee_deposit_start->format('Y-m-d'),
                'fee_deposit_end' => $this->schedule->fee_deposit_end->format('Y-m-d'),
                'late_fee_starts_from' => $this->schedule->late_fee_starts_from->format('Y-m-d'),
                'subjects' => $this->schedule->subjects->pluck('subject_id')->toArray(),
                'groups' => $this->schedule->groups->toArray(),
            ];
        }
    }
    public function addGroup()
    {
        $this->form['groups'][] = [
            'name' => '',
            'course_subjects_id' => [],
        ];
    }
    public function removeGroup($index)
    {
        unset($this->form['groups'][$index]);
    }
    public function render()
    {
        $courses = Course::all()->map(function ($course) {
            return [
                'id' => $course->id,
                'name' => $course->name,
            ];
        });
        $academicYears = AcademicYear::all()->map(function ($year) {
            return [
                'id' => $year->id,
                'name' => $year->year_start->format('M Y') . ' - ' . $year->year_end->format('M Y'),
            ];
        });

        $subjects = Subject::all()->map(function ($subject) {
            return [
                'id' => $subject->id,
                'name' => $subject->name,
            ];
        });
        $years = ['First', 'Second', 'Third', 'Fourth'];
        return view('livewire.schedule-form')->layout('layouts.app')->with([
            'courses' => $courses,
            'academicYears' => $academicYears,
            'years' => $years,
            'subjects' => $subjects
        ]);
    }

    public function save()
    {
        $this->validate([
            'form.course_id' => 'required|exists:courses,id',
            'form.academic_year_id' => 'required|exists:academic_years,id',
            'form.year' => 'required|in:First,Second,Third,Fourth',
            'form.submission_from' => 'required|date',
            'form.submission_till' => 'required|date|after:form.submission_from',
            'form.fee_deposit_start' => 'required|date|after:form.submission_till',
            'form.fee_deposit_end' => 'required|date|after:form.fee_deposit_start',
            'form.late_fee_starts_from' => 'required|date|after:form.fee_deposit_end',
        ]);
        if ($this->schedule) {
            $this->schedule->update($this->form);
            $this->schedule->subjects()->delete();
            $this->schedule->groups()->delete();
        } else {
            $this->schedule = CourseSchedule::create($this->form);
        }
        foreach ($this->form['subjects'] as $subject) {
            $this->schedule->subjects()->create([
                'subject_id' => $subject,
                'is_optional' => false,
            ]);
        }
        foreach ($this->form['groups'] as $group) {
            $this->schedule->groups()->create([
                'name' => $group['name'],
                'course_subjects_id' => $group['course_subjects_id'],
            ]);
        }
        $this->success('Schedule saved successfully');
        return redirect()->route('schedule-list');
    }
}

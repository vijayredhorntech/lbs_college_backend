<?php

namespace App\Livewire;

use App\Models\Enrollment;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridColumns;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class EnrollmentTable extends PowerGridComponent
{
    use WithExport;

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        if(auth()->user()->hasRole('admin')){
            return Enrollment::query();
        } else {
            return Enrollment::whereHas('student', function($query){
                $query->where('user_id', auth()->id());
            });
        }
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('id')
            ->addColumn('student', fn (Enrollment $model) => $model->student->first_name . ' ' . $model->student->last_name)
            ->addColumn('course_schedule', fn(Enrollment $model) => $model->courseSchedule->course->name . '('.$model->courseSchedule->year.')' . ' - ' . $model->courseSchedule->academicYear->year_start->format('M Y') . '/' . $model->courseSchedule->academicYear->year_end->format('M Y') )
            ->addColumn('enrollment_date_formatted', fn (Enrollment $model) => Carbon::parse($model->enrollment_date)->format('d/m/Y'))
            ->addColumn('created_at_formatted', fn (Enrollment $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'));
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Student', 'student'),
            Column::make('Course Schedule', 'course_schedule'),
            Column::make('Enrollment date', 'enrollment_date_formatted', 'enrollment_date')
                ->sortable(),


            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::datepicker('enrollment_date'),
            Filter::datetimepicker('created_at'),
        ];
    }

    #[\Livewire\Attributes\On('enrollmentForm')]
    public function enrollmentForm(Enrollment $enrollment): void
    {
        $this->redirect(route('student-profile', ['student' => $enrollment->student->uuid]));
    }

    public function actions(\App\Models\Enrollment $row): array
    {
        return [
            Button::add('edit')
                ->slot('Form')
                ->id()
                ->class('w-max bg-green/80 rounded-[3px] text-white px-4 py-1.5 font-semibold text-md border-[1px] border-green hover:bg-green transition ease-in duration-2000')
                ->dispatch('enrollmentForm', ['enrollment' => $row->id])
        ];
    }

    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}

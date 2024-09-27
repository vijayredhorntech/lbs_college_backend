<?php

namespace App\Livewire;

use App\Models\CourseSchedule;
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

final class ScheduleTable extends PowerGridComponent
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
        return CourseSchedule::query()->with('course');
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('course', fn(CourseSchedule $model) => $model->course->name)
            ->addColumn('academic_year', fn(CourseSchedule $model) => $model->academicYear->year_start->format('M Y').' - '.$model->academicYear->year_end->format('M Y'))
            ->addColumn('year')
            ->addColumn('submission_from_formatted', fn (CourseSchedule $model) => Carbon::parse($model->submission_from)->format('d/m/Y'))
            ->addColumn('submission_till_formatted', fn (CourseSchedule $model) => Carbon::parse($model->submission_till)->format('d/m/Y'))
            ->addColumn('fee_deposit_start_formatted', fn (CourseSchedule $model) => Carbon::parse($model->fee_deposit_start)->format('d/m/Y'))
            ->addColumn('fee_deposit_end_formatted', fn (CourseSchedule $model) => Carbon::parse($model->fee_deposit_end)->format('d/m/Y'))
            ->addColumn('late_fee_starts_from_formatted', fn (CourseSchedule $model) => Carbon::parse($model->late_fee_starts_from)->format('d/m/Y'))
            ->addColumn('created_at_formatted', fn (CourseSchedule $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'));
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Course', 'course'),
            Column::make('Academic year', 'academic_year'),
            Column::make('Year', 'year')
                ->sortable()
                ->searchable(),

            Column::make('Submission from', 'submission_from_formatted', 'submission_from')
                ->sortable(),

            Column::make('Submission till', 'submission_till_formatted', 'submission_till')
                ->sortable(),

            Column::make('Fee deposit start', 'fee_deposit_start_formatted', 'fee_deposit_start')
                ->sortable(),

            Column::make('Fee deposit end', 'fee_deposit_end_formatted', 'fee_deposit_end')
                ->sortable(),

            Column::make('Late fee starts from', 'late_fee_starts_from_formatted', 'late_fee_starts_from')
                ->sortable(),



            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::datepicker('submission_from'),
            Filter::datepicker('submission_till'),

        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
       $this->redirect(route('schedule-form', ['schedule' => $rowId]));
    }

    public function actions(\App\Models\CourseSchedule $row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit')
                ->id()
                ->class('w-max bg-blue/80 rounded-[3px] text-white px-4 py-1.5 font-semibold text-md border-[1px] border-blue hover:bg-blue transition ease-in duration-2000')
                ->dispatch('edit', ['rowId' => $row->id])
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

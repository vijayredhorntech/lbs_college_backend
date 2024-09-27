<?php

namespace App\Livewire;

use App\Models\StudentEducationDocument;
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

final class StudentEducationDocumentTable extends PowerGridComponent
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
        return StudentEducationDocument::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('examination_name')
            ->addColumn('document', function (StudentEducationDocument $model) {
                $src = asset('storage/' . $model->document);
                return '<a href="' . $src . '" target="_blank"><img src="' . $src . '" alt="Document" style="max-width: 100px; height: auto;"></a>';
            })
            ->addColumn('roll_number')
            ->addColumn('board_university')
            ->addColumn('name_of_institute')
            ->addColumn('obtained_total_marks')
            ->addColumn('cgpa')
            ->addColumn('percentage')
            ->addColumn('subjects')
            ->addColumn('result_awaited')

            ->addColumn('created_at_formatted', fn (StudentEducationDocument $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'));
    }


    public function columns(): array
    {
        return [
            Column::make('Examination name', 'examination_name')
                ->sortable()
                ->searchable(),
            Column::make('Document', 'document'),

            Column::make('Roll number', 'roll_number'),

            Column::make('Board university', 'board_university'),

            Column::make('Name of institute', 'name_of_institute'),

            Column::make('Obtained total marks', 'obtained_total_marks'),

            Column::make('Cgpa', 'cgpa'),

            Column::make('Percentage', 'percentage'),

            Column::make('Subjects', 'subjects'),

            Column::make('Result awaited', 'result_awaited'),

            Column::make('Created at', 'created_at_formatted', 'created_at'),

            Column::action('Action')
        ];
    }


    public function filters(): array
    {
        return [
            Filter::boolean('result_awaited'),
            Filter::datetimepicker('created_at'),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('
            window.location.href = "' . route('student_education_documents_edit', ['id' => $rowId]) . '";
        ');
    }



    public function actions(\App\Models\StudentEducationDocument $row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit')
                ->id()
                ->class('w-max bg-blue/80 rounded-[3px] text-white px-4 py-1.5 font-semibold text-md border-[1px] border-blue hover:bg-blue transition ease-in duration-2000')
                ->dispatch('edit', ['rowId' => $row->id]),
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

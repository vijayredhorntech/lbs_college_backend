<?php

namespace App\Livewire;

use App\Models\Subject;
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

final class SubjectTable extends PowerGridComponent
{
    use WithExport;

    public function setUp(): array
    {

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
        return Subject::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('id')
            ->addColumn('name')
            ->addColumn('code')

           /** Example of custom column using a closure **/
            ->addColumn('code_lower', fn (Subject $model) => strtolower(e($model->code)))

            ->addColumn('description')
            ->addColumn('created_at_formatted', fn (Subject $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'));
    }

    public function columns(): array
    {
        return [
            Column::make('Name', 'name')
                ->sortable()
                ->searchable(),

            Column::make('Code', 'code')
                ->sortable()
                ->searchable(),

            Column::make('Description', 'description')
                ->sortable()
                ->searchable(),



            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::inputText('code')->operators(['contains']),
            Filter::inputText('name')->operators(['contains']),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->redirect(route('subject-form',  $rowId));
    }

    public function actions(\App\Models\Subject $row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit')
                ->id()
                ->class('w-max bg-blue/80 rounded-[3px] text-white px-4 py-1.5 font-semibold text-md border-[1px] border-blue hover:bg-blue transition ease-in duration-2000')
                ->dispatch('edit', ['rowId' => $row->slug])
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

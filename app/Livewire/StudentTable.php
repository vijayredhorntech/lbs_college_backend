<?php

namespace App\Livewire;

use App\Models\Student;
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

final class StudentTable extends PowerGridComponent
{
    use WithExport;

    public function setUp(): array
    {
//        $this->showCheckBox();

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
        return Student::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('id')
            ->addColumn('photo')
            ->addColumn('photo_lower', fn(Student $model) => strtolower(e($model->photo)))
            ->addColumn('name', function (Student $model) {
                return $model->first_name . ' ' . $model->last_name;
            })
            ->addColumn('guardian_father_name')
            ->addColumn('email')
            ->addColumn('phone')
            ->addColumn('date_of_birth',fn(Student $model) => Carbon::parse($model->date_of_birth)->format('d-M-Y'))
            ->addColumn('gender', function (Student $model) {
                $gender = $model->gender;
                switch ($gender) {
                    case $gender === 'male':
                        $color = 'blue';
                        $icon = 'fa-male';
                        break;
                    case $gender === 'female':
                        $color = 'pink';
                        $icon = 'fa-female';
                        break;
                    default:
                        $color = 'gray';
                        $icon = 'fa-genderless';
                        break;
                }
                return '<span class="bg-'.$color.'-400 p-1 text-black text-xs rounded-md"><i class="fa '.$icon.'"></i> ' . ucfirst($gender) . '</span>';
            })
            ->addColumn('alt_phone')
            ->addColumn('created_at_formatted', fn(Student $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'));
    }

    public function columns(): array
    {
        return [
            Column::make('Name', 'name')
                ->searchable(),


            Column::make('Email', 'email')
                ->sortable()
                ->searchable(),

            Column::make('Phone', 'phone')
                ->sortable()
                ->searchable(),


            Column::make('Date of birth', 'date_of_birth')
                ->sortable()
                ->searchable(),

            Column::make('Gender', 'gender')
                ->sortable()
                ->searchable(),


            Column::make('Guardian/Father name', 'guardian_father_name')
                ->sortable()
                ->searchable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::inputText('photo')->operators(['contains']),
            Filter::inputText('name', 'first_name')->operators(['contains']),
            Filter::inputText('email')->operators(['contains']),
            Filter::inputText('phone')->operators(['contains']),
            Filter::datepicker('date_of_birth', 'date_of_birth'),
            Filter::inputText('guardian_father_name')->operators(['contains']),

            Filter::datetimepicker('created_at'),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($uuid): void
    {
        $this->redirect(route('student-form', ['student' => $uuid]));
    }

    #[\Livewire\Attributes\On('view')]
    public function view(Student $uuid): void
    {
        $this->redirect(route('student-profile', $uuid));
    }

    public function actions(\App\Models\Student $row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit')
                ->id()
                ->class(' w-max bg-blue/80 rounded-[3px] text-white px-4 py-1.5 font-semibold text-md border-[1px] border-blue hover:bg-blue transition ease-in duration-2000')
                ->dispatch('edit', ['uuid' => $row->uuid]),
        Button::add('view')
                ->slot('View')
                ->id()
                ->class('w-max bg-green/80 rounded-[3px] text-white px-4 py-1.5 font-semibold text-md border-[1px] border-green hover:bg-green transition ease-in duration-2000')
                ->dispatch('view', ['uuid' => $row->uuid])
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

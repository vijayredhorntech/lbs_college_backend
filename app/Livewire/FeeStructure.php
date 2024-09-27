<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\FeeStructure as FeeStructureModel;
use Masmerise\Toaster\Toastable;

class FeeStructure extends Component
{
    use Toastable;
    public $feeStructures;
    public $feeModel = [];

    public function mount()
    {
        $this->feeStructures = FeeStructureModel::all();
        foreach ($this->feeStructures as $fee) {
            $this->feeModel[$fee->id] = $fee->amount;
        }
    }

    public function save()
    {
        foreach ($this->feeModel as $id => $amount) {
            $feeStructure = FeeStructureModel::find($id);
            if ($feeStructure) {
                $feeStructure->amount = $amount;
                $feeStructure->save();
            }
        }

        $this->success('Fee Structure updated successfully!');

        // Refresh the feeStructures after saving
        $this->feeStructures = FeeStructureModel::all();
        foreach ($this->feeStructures as $fee) {
            $this->feeModel[$fee->id] = $fee->amount;
        }
    }
    public function render()
    {
        return view('livewire.fee-structure')->layout('layouts.app');
    }
}

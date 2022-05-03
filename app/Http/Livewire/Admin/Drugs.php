<?php

namespace App\Http\Livewire\Admin;

use App\Models\Drug;
use App\Models\DrugInventory;
use Livewire\Component;
use Livewire\WithPagination;

class Drugs extends Component
{
    use WithPagination;
    public $addDrug = false;
    public $editDrug = false;
    public $brandName, $genName, $quantity, $batch, $description, $expiryDate, $inventoryId, $drugId;
    public $drugName, $genericName, $descript, $quant, $batchCode, $expiry;

    protected $rules = [
        'brandName' => 'required|string',
        'genName' => 'required',
        'description' => 'required',
        'quantity' => 'required',
        'batch' => 'required',
        'expiryDate' => 'required',
        'drugName' => 'required',
        'genericName' => 'required',
        'descript' => 'required',
        'quant' => 'required',
        'batchCode' => 'required',
        'expiry' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function createDrug()
    {
        $this->validate();
        $id = Drug::create([
            'drug_name' => $this->brandName,
            'generic_name' => $this->genName,
            'description' => $this->description,
        ])->id;

        DrugInventory::create([
            'drug_id' => $id,
            'quantity' => $this->quantity,
            'batch_no' => $this->batch,
            'expiration_date' => $this->expiryDate,
        ]);

        return redirect()->route('admin.drug');
    }

    public function drugEdit($id)
    {
        $this->editDrug = true;
        $singleDrug = DrugInventory::find($id);
        $this->quant = $singleDrug->quantity;
        $this->batchCode = $singleDrug->batch_no;
        $this->expiry = $singleDrug->expiration_date;
        $this->drugId = $singleDrug->drug_id;
        $this->inventoryId = $id;

        $singleData = Drug::find($this->drugId);
        $this->drugName = $singleData->drug_name;
        $this->genericName = $singleData->generic_name;
        $this->descript = $singleData->description;
    }

    public function updateDrug()
    {
        // $this->validate();

        Drug::where('id', $this->drugId)->update([
            'drug_name' => $this->drugName,
            'generic_name' => $this->genericName,
            'description' => $this->descript,
        ]);

        DrugInventory::where('id', $this->inventoryId)->update([
            'quantity' => $this->quant,
            'batch_no' => $this->batchCode,
            'expiration_date' => $this->expiry,
        ]);
        return redirect()->route('admin.drug');
    }

    public function deleteDrug($id)
    {
        DrugInventory::where('id', $id)->delete();
    }

    public function render()
    {
        $drug = DrugInventory::with('drug')->paginate(10);
        return view('livewire.admin.drugs', [
            'drug' => $drug,
        ]);
    }
}

<?php

namespace App\Http\Livewire\Pharmacist;

use App\Models\DrugInventory;
use App\Models\Prescription;
use App\Models\PrescriptionOrder;
use Livewire\Component;

class Orders extends Component

{
    public $singlePrescription;
    public $viewInfo = false;
    
    public function updateOrder($id)
    {
        $prescriptionId = PrescriptionOrder::where('id', $id)->value('prescription_id');
        $quantity = Prescription::where('id', $prescriptionId)->value('quantity');
        $drugId = Prescription::where('id', $prescriptionId)->value('drug_id');
        $inventory = DrugInventory::where('drug_id', $drugId)->value('quantity');
        $status = PrescriptionOrder::where('id', $id)->value('status');

        if ($status !== 'Fulfilled') {
            if ($quantity <= $inventory) 
            {
                PrescriptionOrder::where('id', $id)->update([
                    'status' => 'fulfilled',
                ]);

                DrugInventory::where('drug_id', $drugId)->update([
                    'quantity' => $inventory - $quantity,
                ]);
                session()->flash('message', 'Order Updated');
            } else{
                session()->flash('message', 'Drug out of stock');
            }
            
        }   
        
    }


    public function viewPrescription($id)
    {
        $this->viewInfo = true;
        $this->singlePrescription = Prescription::find($id);
    }

    public function pickUpOrder($id)
    {
        $status = PrescriptionOrder::where('id', $id)->value('status');
        if ($status !== 'Ready for PickUp') {
            PrescriptionOrder::where('id', $id)->update([
                'status' => 'Ready for Pick Up',
            ]);
            session()->flash('message', 'Order Updated');
        }
        
    }
    public function render()
    {

        return view('livewire.pharmacist.orders', [
            'orders' => PrescriptionOrder::with('patient', 'prescription')->orderByDesc('id')->get(),
        ]);
    }
}

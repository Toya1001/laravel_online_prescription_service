<?php

namespace App\Http\Livewire\Patient;

use App\Models\DrugInventory;
use App\Models\Patient;
use App\Models\Prescription;
use App\Models\PrescriptionOrder;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Prescriptions extends Component
{
    use WithPagination;
    public $singlePrescription;
    public $viewInfo = false;

    public function viewPrescription($id)
    {
        $this->viewInfo = true;
        $this->singlePrescription = Prescription::find($id);
    }

    public function refillOrder($id)
    {
        $quantity = Prescription::where('id', $id)->value('quantity');
        $drugId = Prescription::where('id', $id)->value('drug_id');
        $inventory = DrugInventory::where('drug_id', $drugId)->value('quantity');
        $refillNo = Prescription::where('id', $id)->value('repeat');
        $orders = PrescriptionOrder::where('prescription_id', $id)->count();
        if ($orders > $refillNo) {
            session()->flash('message', 'Reached Refill limit. Unable to process order');
        } else {
            if ($quantity <= $inventory) {
                PrescriptionOrder::create([
                    'prescription_id' => $id,
                    'patient_id' => Patient::where('user_id', Auth::id())->value('id'),
                    'status' => 'Pending',
                ]);
            } else{
                session()->flash('message', 'Drug out of stock'); 
            }
        }
    }
    public function render()
    {
        $patientId = Patient::where('user_id', Auth::id())->value('id');
        $prescription = Prescription::where('patient_id', $patientId)->paginate(5);
        return view('livewire.patient.prescriptions', [
            'prescription' => $prescription,
        ]);
    }
}

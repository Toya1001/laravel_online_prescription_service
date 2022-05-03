<?php

namespace App\Http\Livewire\Pharmacist;

use App\Models\DrugInventory;
use App\Models\Patient;
use App\Models\Prescription;
use App\Models\PrescriptionOrder;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $patients = Patient::count();
        $orders = PrescriptionOrder::count();
        $drugs = DrugInventory::sum('quantity');
        $prescriptions = Prescription::count();
        return view('livewire.pharmacist.dashboard',[
            'patients' => $patients,
            'orders' => $orders,
            'drugs' => $drugs,
            'prescriptions' => $prescriptions
        ]);
    }
}

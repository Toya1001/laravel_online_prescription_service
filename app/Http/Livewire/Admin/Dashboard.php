<?php

namespace App\Http\Livewire\Admin;

use App\Models\Doctor;
use App\Models\DrugInventory;
use App\Models\Patient;
use App\Models\Prescription;
use App\Models\PrescriptionOrder;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $patients= Patient::count();
        $prescriptions = Prescription::count();
        $doctors = Doctor::count();
        $inventory = DrugInventory::sum('quantity');
        return view('livewire.admin.dashboard', [
            'patients' =>$patients,
            'prescriptions' =>$prescriptions,
            'doctors' => $doctors,
            'inventory' =>$inventory,
        ]);
    }
}

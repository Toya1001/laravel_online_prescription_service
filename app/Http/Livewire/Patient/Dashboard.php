<?php

namespace App\Http\Livewire\Patient;

use App\Models\Patient;
use App\Models\Prescription;
use App\Models\PrescriptionOrder;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class Dashboard extends Component
{
    public $noInfo = false;

    public function mount()
    {
        $patient = Patient::where('user_id', Auth::id())->count();
        if ($patient === 1 ) {
            $this->noInfo = false;
        } else {
            $this->noInfo = true;
        }
    }

    

    public function render()
    {
        $patientId = Patient::where('user_id', Auth::id())->value('id'); 
        $orders = PrescriptionOrder::where('patient_id', $patientId)->count();
        $prescription = Prescription::where('patient_id', $patientId)->count();
        return view('livewire.patient.dashboard', [
            'orders' => $orders,
            'prescription' => $prescription,
        ]);
    }
}

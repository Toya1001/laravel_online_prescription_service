<?php

namespace App\Http\Livewire\Patient;

use App\Models\Patient;
use App\Models\Prescription;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Prescriptions extends Component
{
    use WithPagination;
    public function render()
    {
        $patientId = Patient::where('user_id', Auth::id())->value('id');
        $prescription = Prescription::where('patient_id', $patientId)->paginate(5);
        return view('livewire.patient.prescriptions',[
            'prescription' => $prescription,
        ]);
    }
}

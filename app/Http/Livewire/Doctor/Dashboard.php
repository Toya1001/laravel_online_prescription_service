<?php

namespace App\Http\Livewire\Doctor;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Prescription;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $doctorId = Doctor::where('user_id', Auth::id())->value('id');
        $patient = Prescription::where('doctor_id', $doctorId)->count();
        $prescription = Prescription::where('doctor_id', $doctorId)->count();
        return view('livewire.doctor.dashboard', [
            'patient' => $patient,
            'prescription' => $prescription
        ]);
    }
}

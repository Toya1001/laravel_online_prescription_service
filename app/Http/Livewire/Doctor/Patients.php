<?php

namespace App\Http\Livewire\Doctor;

use App\Models\Doctor;
use App\Models\Prescription;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Patients extends Component
{
    public function render()
    {
        $docId = Doctor::where('user_id', Auth::id())->value('id');
        $patient = Prescription::where('doctor_id', $docId)->get();
        return view('livewire.doctor.patients', [
            'patient' => $patient,
        ]);
    }
}

<?php

namespace App\Http\Livewire\Patient;

use App\Models\Patient;
use App\Models\PrescriptionOrder;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Orders extends Component
{
    public function render()
    {
        $patientId= Patient::where('user_id', Auth::id())->value('id');
        return view('livewire.patient.orders',[
            'orders' => PrescriptionOrder:: with('prescription', 'patient')->where('patientid', $patientId)->get(),
        ]);
    }
}

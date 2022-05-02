<?php

namespace App\Http\Livewire\Patient;

use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Information extends Component
{
    public function render()
    {
        $patientId = Patient::where('user_id', Auth::id())->value('id');
        $info = Patient::where('id', $patientId)->get();
        
        return view('livewire.patient.information', [
            'info' => $info,
        ]);
    }
}

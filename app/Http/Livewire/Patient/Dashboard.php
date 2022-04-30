<?php

namespace App\Http\Livewire\Patient;

use App\Models\Patient;
use App\Models\Prescription;
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
        
        return view('livewire.patient.dashboard');
    }
}

<?php

namespace App\Http\Livewire\Doctor;

use App\Models\Doctor;
use App\Models\Prescription;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Prescriptions extends Component
{

    public $viewInfo  = false;
    public $singlePrescription;

    public function viewPrescription($id)
    {
        $this->viewInfo = true;
        $this->singlePrescription = Prescription::find($id);
    }
    public function render()
    {
        $docId = Doctor::where('user_id', Auth::id())->value('id');
        // dd($docId);
        $doctor = Prescription::where('doctor_id',$docId)->orderByDesc('id')->paginate(6);
        return view('livewire.doctor.prescriptions',[
            'doctor' => $doctor,
        ]);
    }
}

<?php

namespace App\Http\Livewire\Doctor;

use App\Models\Doctor;
use App\Models\Prescription;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Prescriptions extends Component
{

    public $viewInfo  = false;
    public $addPrescription = false;
    public $singlePrescription;
    public $patientName = '';
    public $drug, $quantity, $duration, $repeat, $directions, $doctors, $drugs, $patient;

    public function mount()
    {
    }

    public function clear(){
        $this->patientName = "";
        $this->patient = [];

    }

    public function updatedPatientName()
    {

        $this->patient = User::where('fname', 'like', '%' . $this->patientName . '%')
            ->orWhere('lname', 'like', '%' . $this->patientName . '%')
            ->get()
            ->toArray();
    }

    public function createPrescription()
    {
        
        Prescription::create([]);
    }

    public function viewPrescription($id)
    {
        $this->viewInfo = true;
        $this->singlePrescription = Prescription::find($id);
    }
    public function render()
    {

        $docId = Doctor::where('user_id', Auth::id())->value('id');
        // dd($docId);
        $doctor = Prescription::where('doctor_id', $docId)->orderByDesc('id')->paginate(6);
        return view('livewire.doctor.prescriptions', [
            'doctor' => $doctor,
        ]);
    }
}

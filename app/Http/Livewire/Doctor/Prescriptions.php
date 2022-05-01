<?php

namespace App\Http\Livewire\Doctor;

use App\Models\Doctor;
use App\Models\Drug;
use App\Models\Patient;
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
    public $drug, $quantity, $duration, $repeat, $directions, $doctors,  $drugs, $patient;

    protected $rules =[
        'drug' => 'required',
            'quantity' => 'required',
            'duration' => 'required',
            'repeat' => 'required',
            'directions' => 'required',
            'doctors' => 'required',
            'drugs' => 'required',
            'patient' => 'required',
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }
    
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

    public function editPrescription($id){

    }

    public function viewPrescription($id)
    {
        $this->viewInfo = true;
        $this->singlePrescription = Prescription::find($id);
    }
    public function render()
    {
        $drugs= Drug::all();
        $patient = Patient::all();
        $doctors = Doctor::with('user')->get();
        $docId = Doctor::where('user_id', Auth::id())->value('id');
        // dd($docId);
        $doctor = Prescription::where('doctor_id', $docId)->orderByDesc('id')->paginate(6);
        return view('livewire.doctor.prescriptions', [
            'doctor' => $doctor,
            'drugs' => $drugs,
            'patient' =>  $patient, 
            'doctors' => $doctors

        ]);
    }
}

<?php

namespace App\Http\Livewire\Doctor;

use App\Models\Doctor;
use App\Models\Drug;
use App\Models\Patient;
use App\Models\Prescription;
use App\Models\PrescriptionOrder;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Prescriptions extends Component
{

    public $viewInfo  = false;
    public $addPrescription = false;
    public $prescriptionEdit = false;
    public $singlePrescription;
    public $patientName = "";
    public $dosage = ""; 
    public $singlePrescriptId;
    public $drug = "";
    public $quantity = ""; 
    public $duration = "";
    public $repeat = "";
    public $directions = ""; 

    protected $rules = [
        'drug' => 'required',
        'quantity' => 'required',
        'duration' => 'required',
        'repeat' => 'required',
        'directions' => 'required',
        'dosage' => 'required',
        'patientName' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function openForm(){
        $this->addPrescription = true;
        $this->reset(['dosage', 'patientName', 'drug', 'repeat', 'directions', 'duration', 'quantity']);
    }

    public function createPrescription()
    {
        $this->validate();
        $this->doctorId = Doctor::where('user_id', Auth::id())->value('id');
        // dd($this->patientName);
        $id = Prescription::create([
            'patient_id' => $this->patientName,
            'drug_id' => $this->drug,
            'doctor_id' => $this->doctorId,
            'rx_no' => 'RX' . mt_rand(10000, 999999),
            'dosage' => $this->dosage,
            'quantity' => $this->quantity,
            'directions' => $this->directions,
            'duration' => $this->duration,
            'repeat' => $this->repeat,
        ])->id;

        PrescriptionOrder::create([
            'prescription_id' => $id,
            'patient_id' => $this->patientName,
        ]);
        return redirect()->route('doctor.prescription');
    }

    public function editPrescription($id)
    {
        $this->prescriptionEdit = true;
        $onePrescript = Prescription::find($id);
        $this->patientName = $onePrescript->patient_id;
        $this->drug = $onePrescript->drug_id;
        $this->dosage = $onePrescript->dosage;
        $this->quantity = $onePrescript->quantity;
        $this->directions = $onePrescript->directions;
        $this->duration = $onePrescript->duration;
        $this->repeat = $onePrescript->repeat;
        $this->singlePrescriptId = $id;
        // $this->reset('patientName');

    }

    public function updatePrescription()
    {
        
        // dd($this->drugs);
        $this->validate();
        // $this->doctorId = Doctor::where('user_id', Auth::id())->value('id');
        Prescription::where('id', $this->singlePrescriptId)->update([
            'patient_id' => $this->patientName,
            'drug_id' => $this->drug,
            'dosage' => $this->dosage,
            'quantity' => $this->quantity,
            'directions' => $this->directions,
            'duration' => $this->duration,
            'repeat' => $this->repeat,
            // 'doctor_id' => $this->doctorId,
            // 'rx_no' => $this->rxNo,
        ]);
        $this->reset('dosage');
        
        return redirect()->route('doctor.prescription');
    }

    public function deletePrescription($id){
        Prescription::where('id', $id)->delete();
    }

    public function viewPrescription($id)
    {
        $this->viewInfo = true;
        $this->singlePrescription = Prescription::find($id);
    }
    public function render()
    {
        $pdrugs = Drug::all();
        $people = Patient::with('user')->get()->toArray();
        // dd($patient);
        $doctors = Doctor::with('user')->get();
        $docId = Doctor::where('user_id', Auth::id())->value('id');
        // dd($docId);
        $doctor = Prescription::where('doctor_id', $docId)->orderByDesc('id')->paginate(6);
        return view('livewire.doctor.prescriptions', [
            'doctor' => $doctor,
            'pdrugs' => $pdrugs,
            'people' =>  $people,
            'doctors' => $doctors

        ]);
    }
}

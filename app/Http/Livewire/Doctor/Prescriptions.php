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
    public $prescriptionEdit = false;
    public $singlePrescription;
    public $patientName, $singlePrescriptId, $pquantity, $doctorId, $rxNo;
    public $drug, $quantity, $duration, $repeat, $directions, $dosage, $patient, $direction, $drugs, $pdosage, $pduration, $prepeat;

    protected $rules = [
        'drug' => 'required',
        'quantity' => 'required',
        'duration' => 'required',
        'repeat' => 'required',
        'directions' => 'required',
        'dosage' => 'required',
        'patientName' => 'required',
        'patient' => 'required',
        'pdosage' => 'required',
        'pquantity' => 'required',
        'prepeat' => 'required',
        'pduration' => 'required',
        'direction' => 'required',
        'drugs' => 'required',

    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function createPrescription()
    {
        $this->validate();
        $this->doctorId = Doctor::where('user_id', Auth::id())->value('id');
        // dd($this->patientName);
        Prescription::create([
            'patient_id' => $this->patientName,
            'drug_id' => $this->drug,
            'doctor_id' => $this->doctorId,
            'rx_no' => 'RX' . mt_rand(10000, 999999),
            'dosage' => $this->dosage,
            'quantity' => $this->quantity,
            'directions' => $this->directions,
            'duration' => $this->duration,
            'repeat' => $this->repeat,
        ]);
        return redirect()->route('doctor.prescription');
    }
    public function editPrescription($id)
    {
        $this->prescriptionEdit = true;
        $onePrescript = Prescription::find($id);
        $this->patient = $onePrescript->patient_id;
        $this->drugs = $onePrescript->drug_id;
        $this->pdosage = $onePrescript->dosage;
        $this->pquantity = $onePrescript->quantity;
        $this->direction = $onePrescript->directions;
        $this->pduration = $onePrescript->duration;
        $this->prepeat = $onePrescript->repeat;
        $this->rxNo = $onePrescript->rx_no;
        $this->singlePrescriptId = $id;
    }

    public function updatePrescription()
    {

        $this->validate();

        Prescription::where('id', $this->singlePrescriptId)->update([
            'patient_id' => $this->patient,
            'drug_id' => $this->drugs,
            'dosage' => $this->pdosage,
            'quantity' => $this->pquantity,
            'directions' => $this->direction,
            'duration' => $this->pduration,
            'repeat' => $this->prepeat,
            'doctor_id' => $this->doctorId,
            'rx_no' => $this->rxNo,
        ]);
        return redirect()->route('doctor.prescription');
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

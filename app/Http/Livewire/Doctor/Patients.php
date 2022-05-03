<?php

namespace App\Http\Livewire\Doctor;

use App\Models\AssignPatient;
use App\Models\Doctor;
use App\Models\MedicalHistory;
use App\Models\Patient;
use App\Models\Prescription;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class Patients extends Component
{
    use WithPagination;
    public $history = false;
    public $patientEdit =  false;
    public $historyData, $allergies, $illness, $pregnant, $medicalHistoryId, $patientId, $addPatient, $patientID, $userID;
    public $firstName, $lastName, $email, $trn, $gender, $address, $city, $parish, $dob, $phone, $mxNo;

    protected $rules = [
        'firstName' => 'required|string',
        'lastName' => 'required|string',
        'email' => 'required|email|unique:users,email',
        'trn' => 'required',
        'address' => 'required|string',
        'city' => 'required|string',
        'parish' => 'required',
        'phone' => 'required',
        'mxNo' => 'required|unique:patients,mx_no',
        'dob' => 'required',
        'gender' => 'required',
    ];

    public function createMxNo()
    {
        $this->mxNo = 'MX' . mt_rand(10000, 999999);
    }

    
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function createPatient()
    {
        $this->validate();
           $id =  User::create([
            'fname' => $this->firstName,
            'lname' => $this->lastName,
            'email' => $this->email,
            'user_type' => "Patient",
            'password' => Hash::make('password'),
        ])->id;

           $patientId= Patient::create([
            'user_id' => $id,
            'mx_no' => $this->mxNo,
            'dob' => $this->dob,
            'gender' => $this->gender,
            'trn' => $this->trn,
            'address' => $this->address,
            'city' => $this->city,
            'parish' => $this->parish,
            'tel_no' => $this->phone
        ])->id;

        AssignPatient::create([
            'doctor_id' => Doctor::where('user_id', Auth::id())->value('id'),
            'patient_id' =>$patientId,
        ]);


        
        return redirect()->route('doctor.patient');
    }

    public function editPatient($id)
    {
        $this->patientEdit = true;
        $info = Patient::find($id);
        // dd($info);
        $this->dob = $info->dob;
        $this->gender = $info->gender;
        $this->trn = $info->trn;
        $this->address = $info->address;
        $this->city = $info->city;
        $this->parish = $info->parish;
        $this->phone =  $info->tel_no;
        $this->userID = $info->user_id;
        $this->mxNo = $info->mx_no;
        $this->patientID = $id;


        $data = User::find($this->userID);
        $this->firstName = $data->fname;
        $this->lastName = $data->lname;
        $this->email = $data->email;
    }

    public function updatePatient()
    {
        $this->validate();
        User::where('id', $this->userID)->update([
            'fname' => $this->firstName,
            'lname' => $this->lastName,
            'email' => $this->email,
        ]);

        Patient::where('id', $this->patientID)->update([
            'user_id' => $this->userID,
            'mx_no' => $this->mxNo,
            'dob' => $this->dob,
            'gender' => $this->gender,
            'trn' => $this->trn,
            'address' => $this->address,
            'city' => $this->city,
            'parish' => $this->parish,
            'tel_no' => $this->phone
        ]);
        return redirect()->route('doctor.patient');
    }

    public function medicalHistory($id)
    {
        $this->history = true;
        // dd($id);
        $this->historyData = MedicalHistory::find($id);
        // dd($this->historyData['Patient']['allergies']);
        $this->allergies = $this->historyData->allergies ?? "";
        $this->illness = $this->historyData->health->conditions ?? "";
        if ($this->historyData->pregnant_nursing ?? "") {
            $this->pregnant = "Yes";
        }
        $this->pregnant = "No";
        $this->medicalHistoryId = $id;
        $this->patientId = $this->historyData->id ?? "";
    }

    public function updateMedicalHistory()
    {
        if ($this->medicalHistoryId === 0) {
            // dd($this->medicalHistoryId); 
            if ($this->pregnant === "Yes") {
                $this->pregnant = 1;
            } else { 
                $this->pregnant = 0;
            }
            MedicalHistory::where('id', $this->MedicalHistoryId)->update([
                'patient_id' => $this->patientId,
                'allergies' => $this->allergies,
                'health_conditions' => $this->illness,
                'pregnant_nursing' => $this->pregnant
            ]);
        } else {
            if ($this->pregnant === "Yes") {
                $this->pregnant = 1;
            } else {
                $this->pregnant = 0;
            }

            MedicalHistory::where('id', $this->MedicalHistoryId)->update([
                'patient_id' => $this->patientId,
                'allergies' => $this->allergies,
                'health_conditions' => $this->illness,
                'pregnant_nursing' => $this->pregnant
            ]);
        }
        return redirect()->route('doctor.patient');
    }


    public function render()
    {
        $docId = Doctor::where('user_id', Auth::id())->value('id');
        $patient = Prescription::where('doctor_id', $docId)->get();
        // dd($patient);
        return view('livewire.doctor.patients', [
            'patient' => $patient,
        ]);
    }
}

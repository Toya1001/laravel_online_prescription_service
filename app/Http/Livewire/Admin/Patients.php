<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

use Livewire\Component;
use Livewire\WithPagination;

class Patients extends Component
{
    use WithPagination;
    public $history = false;
    public $patientEdit =  false;
    public $historyData, $allergies, $illness, $pregnant, $medicalHistoryId, $patientId, $addPatient, $patientID, $userID;
    public $firstName, $lastName, $email, $trn, $gender, $address, $city, $parish, $dob, $phone, $mxNo, $emailAddress;

    protected $rules = [
        'firstName' => 'required|string|min:2',
        'lastName' => 'required|string|min:2',
        'email' => 'required|email',
        'trn' => 'required',
        'address' => 'required|string',
        'city' => 'required|string',
        'parish' => 'required',
        'phone' => 'required',
        'mxNo' => 'required',
        'dob' => 'required',
        'gender' => 'required',
        'emailAddress' =>'required',
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function createMxNo(){
    $this->mxNo = 'MX' . mt_rand(10000, 999999);
    }

    public function createPatient()
    {
        $this->validate();
        Http::post('http://latoya.fimijm.com/eprescriptionapi/api/user', [
            'fname' => $this->firstName,
            'lname' => $this->lastName,
            'email' => $this->email,
            'user_type' => "Patient",
            'password' => Hash::make('password')
        ]);

        $data = Http::get('http://latoya.fimijm.com/eprescriptionapi/api/user')->json();
        $data = end($data);
        $userId = reset($data);
       
        Http::post('http://latoya.fimijm.com/eprescriptionapi/api/patient', [
            'user_id' => $userId,
            'mx_no' => $this->mxNo,
            'dob' => $this->dob,
            'gender' => $this->gender,
            'trn' => $this->trn,
            'address' => $this->address,
            'city' => $this->city,
            'parish' => $this->parish,
            'tel_no' => $this->phone
        ]);
        return redirect()->route('admin.patient');
    }

    public function editPatient($id)
    {
        $this->patientEdit = true;
        $info = Http::get('http://latoya.fimijm.com/eprescriptionapi/api/patient/' . $id)->json();
        // dd($info);
        $this->dob = $info['Patient']['dob'];
        $this->gender = $info['Patient']['gender'];
        $this->trn = $info['Patient']['trn'];
        $this->address = $info['Patient']['address'];
        $this->city = $info['Patient']['city'];
        $this->parish = $info['Patient']['parish'];
        $this->phone =  $info['Patient']['tel_no'];
        $this->userID = $info['Patient']['user_id'];
        $this->mxNo = $info['Patient']['mx_no'];
        $this->patientID = $id;


        $data = Http::get('http://latoya.fimijm.com/eprescriptionapi/api/user/' . $this->userID)->json();
        $this->firstName = $data['fname'];
        $this->lastName = $data['lname'];
        $this->email = $data['email'];
    }

    public function updatePatient()
    {
        dd($this->userID);
        // $this->validate();
        Http::put('http://latoya.fimijm.com/eprescriptionapi/api/user/' . $this->userID, [
            'fname' => $this->firstName,
            'lname' => $this->lastName,
            'email' => $this->email,
        ]);

        Http::put('http://latoya.fimijm.com/eprescriptionapi/api/patient/' . $this->patientID, [
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
        return redirect()->route('admin.patient');
    }




    public function medicalHistory($id)
    {
        
        $this->history = true;
        // dd($id);
        $this->historyData = Http::get('http://latoya.fimijm.com/eprescriptionapi/api/patient/' . $id)->collect();
        // dd($this->historyData['Patient']['0']['medical_history']);
        $this->allergies = $this->historyData['Patient']['0']['medical_history']['allergies'] ?? "";
        $this->illness = $this->historyData['Patient']['0']['medical_history']['health_conditions'] ?? "";
        $this->pregnant = $this->historyData['Patient']['0']['medical_history']['pregnant_nursing'] ?? "";
        $this->medicalHistoryId = $this->historyData['Patient']['0']['medical_history']['id'] ?? "";
        $this->patientId = $this->historyData['Patient']['0']['id'] ?? "";
    }

    public function updateMedicalHistory()
    {
        // dd($this->medicalHistoryId);
        if (empty($this->medicalHistoryId)) {
            Http::post('http://latoya.fimijm.com/eprescriptionapi/api/history', [
                'patient_id' => $this->patientId,
                'allergies' => $this->allergies,
                'health_conditions' => $this->illness,
                'pregnant_nursing' => $this->pregnant
            ]);
        } else {
            Http::put('http://latoya.fimijm.com/eprescriptionapi/api/history/' . $this->medicalHistoryId, [
                'patient_id' => $this->patientId,
                'allergies' => $this->allergies,
                'health_conditions' => $this->illness,
                'pregnant_nursing' => $this->pregnant
            ]);
        }
        return redirect()->route('admin.patient');
    }

    public function render()
    {
        $patient = Http::withToken('1|4hOjHuSZBHFlMtftXYeAJ3jTfQhdUdEiaF5GGmy6')->get('http://latoya.fimijm.com/eprescriptionapi/api/patient')->collect();
        //    dd($patient);
        return view('livewire.admin.patients', ['patient' => $patient,]);
    }
}

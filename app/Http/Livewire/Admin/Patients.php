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
    public $firstName, $lastName, $email, $trn, $gender, $address, $city, $parish, $dob, $phone, $mxNo;


    public function createMxNo(){
    $this->mxNo = 'MX' . mt_rand(10000, 999999);
    }

    public function createPatient()
    {
        $this->mxNo = "MX" . mt_rand(100000, 999999);
        Http::post('http://192.168.0.2:8080/api/user', [
            'fname' => $this->firstName,
            'lname' => $this->lastName,
            'email' => $this->email,
            'user_type' => "Patient",
            'password' => Hash::make('password')
        ]);

        $data = Http::get('http://192.168.0.2:8080/api/user')->json();
        $data = end($data);
        $userId = reset($data);
       
        Http::post('http://192.168.0.2:8080/api/patient', [
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
        $info = Http::get('http://192.168.0.2:8080/api/patient/' . $id)->json();
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


        $data = Http::get('http://192.168.0.2:8080/api/user/' . $this->userID)->json();
        $this->firstName = $data['fname'];
        $this->lastName = $data['lname'];
        $this->email = $data['email'];
    }

    public function updatePatient()
    {
        Http::put('http://192.168.0.2:8080/api/user/' . $this->userID, [
            'fname' => $this->firstName,
            'lname' => $this->lastName,
            'email' => $this->email,
        ]);

        Http::put('http://192.168.0.2:8080/api/patient/' . $this->patientID, [
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
        $this->historyData = Http::get('http://192.168.0.2:8080/api/history/' . $id)->json();
        // dd($this->historyData['Patient']['allergies']);
        $this->allergies = $this->historyData['Patient']['allergies'] ?? "";
        $this->illness = $this->historyData['Patient']['health_conditions'] ?? "";
        if ($this->historyData['Patient']['pregnant_nursing'] ?? "") {
            $this->pregnant = "Yes";
        }
        $this->pregnant = "No";
        $this->medicalHistoryId = $id;
        $this->patientId = $this->historyData['Patient']['id'] ?? "";
    }

    public function updateMedicalHistory()
    {
        if ($this->medicalHistoryId === 0) {
            // dd($this->medicalHistoryId); 
            // if ($this->pregnant === "Yes") {
            //     $this->pregnant = 1;
            // } else { 
            //     $this->pregnant = 0;
            // }
            Http::post('http://192.168.0.2:8080/api/history', [
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

            Http::put('http://192.168.0.2:8080/api/history/' . $this->medicalHistoryId, [
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
        $patient = Http::get('http://192.168.0.2:8080/api/patient')->collect();
        //    dd($patient);
        return view('livewire.admin.patients', ['patient' => $patient,]);
    }
}

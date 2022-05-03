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
        Http::withToken('1|4hOjHuSZBHFlMtftXYeAJ3jTfQhdUdEiaF5GGmy6')->post('http://192.168.0.5:8080/api/user', [
            'fname' => $this->firstName,
            'lname' => $this->lastName,
            'email' => $this->email,
            'user_type' => "Patient",
            'password' => Hash::make('password')
        ]);

        $data = Http::withToken('1|4hOjHuSZBHFlMtftXYeAJ3jTfQhdUdEiaF5GGmy6')->get('http://192.168.0.5:8080/api/user')->json();
        $data = end($data);
        $userId = reset($data);
       
        Http::withToken('1|4hOjHuSZBHFlMtftXYeAJ3jTfQhdUdEiaF5GGmy6')->post('http://192.168.0.5:8080/api/patient', [
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
        $info = Http::withToken('1|4hOjHuSZBHFlMtftXYeAJ3jTfQhdUdEiaF5GGmy6')->get('http://192.168.0.5:8080/api/patient/' . $id)->json();
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


        $data = Http::withToken('1|4hOjHuSZBHFlMtftXYeAJ3jTfQhdUdEiaF5GGmy6')->get('http://192.168.0.5:8080/api/user/' . $this->userID)->json();
        $this->firstName = $data['fname'];
        $this->lastName = $data['lname'];
        $this->email = $data['email'];
    }

    public function updatePatient()
    {
        dd($this->userID);
        // $this->validate();
        Http::withToken('1|4hOjHuSZBHFlMtftXYeAJ3jTfQhdUdEiaF5GGmy6')->put('http://192.168.0.5:8080/api/user/' . $this->userID, [
            'fname' => $this->firstName,
            'lname' => $this->lastName,
            'email' => $this->email,
        ]);

        Http::withToken('1|4hOjHuSZBHFlMtftXYeAJ3jTfQhdUdEiaF5GGmy6')->put('http://192.168.0.5:8080/api/patient/' . $this->patientID, [
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
        $this->historyData = Http::withToken('1|4hOjHuSZBHFlMtftXYeAJ3jTfQhdUdEiaF5GGmy6')->get('http://192.168.0.5:8080/api/history/' . $id)->json();
        // dd($this->historyData['Patient']['allergies']);
        $this->allergies = $this->historyData['Patient']['allergies'] ?? "";
        $this->illness = $this->historyData['Patient']['health_conditions'] ?? "";
        if ($this->historyData['Patient']['pregnant_nursing'] ?? "") {
            $this->pregnant = "Yes";
        }
        $this->pregnant = "No";
        $this->medicalHistoryId = $id;
        $this->patientId = $this->historyData['Patient']['id']?? "";
    }

    public function updateMedicalHistory()
    {
    //    dd($this->patientId);
        if (is_null($this->medicalHistoryId)) {
            $newPatientId = Http::withToken('1|4hOjHuSZBHFlMtftXYeAJ3jTfQhdUdEiaF5GGmy6')->get('http://192.168.0.5:8080/api/patient/')->json();
            $data = end($newPatientId);
            $userId = reset($data);
            Http::withToken('1|4hOjHuSZBHFlMtftXYeAJ3jTfQhdUdEiaF5GGmy6')->post('http://192.168.0.5:8080/api/history',[
                'patient_id' => $userId,
                'allergies' => $this->allergies,
                'health_conditions' => $this->illness,
                'pregnant_nursing' => $this->pregnant
            ]);
        } else {
            $history = Http::withToken('1|4hOjHuSZBHFlMtftXYeAJ3jTfQhdUdEiaF5GGmy6')->get('http://192.168.0.5:8080/api/history/' . $this->medicalHistoryId)->json();
            // dd($history['Patient']['patient_id']);
            Http::withToken('1|4hOjHuSZBHFlMtftXYeAJ3jTfQhdUdEiaF5GGmy6')->put('http://192.168.0.5:8080/api/history/' . $this->medicalHistoryId, [
                'patient_id' => $history['Patient']['patient_id'],
                'allergies' => $this->allergies,
                'health_conditions' => $this->illness,
                'pregnant_nursing' => $this->pregnant
            ]);
        }
        return redirect()->route('admin.patient');
    }

    public function render()
    {
        $patient = Http::withToken('1|4hOjHuSZBHFlMtftXYeAJ3jTfQhdUdEiaF5GGmy6')->get('http://192.168.0.5:8080/api/patient')->collect();
        //    dd($patient);
        return view('livewire.admin.patients', ['patient' => $patient,]);
    }
}

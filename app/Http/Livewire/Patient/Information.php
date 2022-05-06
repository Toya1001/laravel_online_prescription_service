<?php

namespace App\Http\Livewire\Patient;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Information extends Component
{
    public $profileEdit= false;
    public $firstName, $lastName, $email, $trn, $gender, $address, $city, $parish, $dob, $phone, $mxNo;

    protected $rules = [
        'firstName' => 'required|string',
        'lastName' => 'required|string',
        'email' => 'required|email',
        'trn' => 'required',
        'address' => 'required|string',
        'city' => 'required|string',
        'parish' => 'required',
        'phone' => 'required',
        'mxNo' => 'required',
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

    public function editProfile($id)
    {
        $this->profileEdit = true;

        $person = User::find($id);

        $this->firstName = $person->fname ?? "";
        $this->lastName = $person->lname ?? "";
        $this->email = $person->email ?? "";
        $this->userID = $id;
         // $data = Patient::where('user_id', $id)->get();
        // dd($data);
        // $this->dob = $data->dob ?? "";
        // $this->gender = $data->gender ?? "";
        // $this->trn = $data->trn ?? "";
        // $this->address = $data->address ?? "";
        // $this->city = $data->city?? "";
        // $this->parish = $data->parish  ?? "";
        // $this->phone =  $data->tel_no ?? "";
        // $this->userID = $data->user_id ?? "";
        // $this->mxNo = $data->mx_no ?? "";
        // $this->patientID = $id ?? "";
        // dd($this->userID);

      
    
    }


    public function updateProfile(){
       User::where('id', $this->userID)->update([
           'fname'=> $this->firstName,
           'lname'=> $this->lastName,
           'email' =>$this->email,
       ]);

       $patientId = Patient::where('user_id', $this->userID)->first();
       if(!$patientId){
           Patient::create(['user_id' => $this->userID,
                'mx_no' => $this->mxNo,
                'dob' => $this->dob,
                'gender' => $this->gender,
                'trn' => $this->trn,
                'address' => $this->address,
                'city' => $this->city,
                'parish' => $this->parish,
                'tel_no' => $this->phone
           ]);
       } else{
           Patient::where('user_id', $this->userId)->update([
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
           
       }
        return redirect()->route('patient.profile');
       }
    
    
    public function render()
    {
        $patientId = Patient::where('user_id', Auth::id())->value('id');
        $info = Patient::where('id', $patientId)->get();
        // dd(Auth::id());
        return view('livewire.patient.information', [
            'info' => $info,
        ]);
    }
}

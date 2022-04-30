<?php

namespace App\Http\Livewire\Pharmacist;

use App\Models\Doctor as ModelsDoctor;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class Doctor extends Component
{
    public $doctorEdit = false;
    public $addDoctor =  false;
    public  $firstName, $lastName, $email, $license, $company, $address;
    public $userId, $doctorId;
    use WithPagination;

    protected $rules = [
        'firstName' => 'required|string|min:2',
        'lastName' => 'required|string|min2',
        'company' => 'required|string',
        'email' => 'required|email|unique:users,email',
        'address' => 'required|string',
        'license' => 'required'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function createDoctor()
    {
        $this->validate();

        $id = User::create([
            'fname' => $this->firstName,
            'lname' => $this->lastName,
            'email' => $this->email,
            'user_type' => 'Doctor',
            'password' => Hash::make('password234'),
        ])->id;

        ModelsDoctor::create([
            'user_id' => $id,
            'license_no' => $this->license,
            'work_name' => $this->company,
            'work_address' => $this->address
        ]);
        return redirect()->route('admin.doctor');
    }

    public function editDoctor($id)
    {
        $this->doctorEdit = true;
        $singleDoctor = ModelsDoctor::find($id);
        $this->license = $singleDoctor->license_no;
        $this->company =  $singleDoctor->work_name;
        $this->address = $singleDoctor->work_address;
        $this->userId = $singleDoctor->user_id;
        $this->doctorId = $id;

        $singleUser = User::find($this->userId);
        $this->firstName = $singleUser->fname;
        $this->lastName = $singleUser->lname;
        $this->email = $singleUser->email;
    }

    public function updateDoctor()
    {
        $this->validate();
        ModelsDoctor::where('id', $this->doctorId)->update([
            'license_no' => $this->license,
            'work_name' => $this->company,
            'work_address' => $this->address
        ]);

        User::where('id', $this->userId)->update([
            'fname' => $this->firstName,
            'lname' => $this->lastName,
            'email' => $this->email
        ]);
        return redirect()->route('admin.doctor');
    }

    public function deleteDoctor($id)
    {
        ModelsDoctor::where('id', $id)->delete();
    }
    public function render()
    {
        $doctor = ModelsDoctor::with('user')->paginate(4);
        return view('livewire.pharmacist.doctor', [
            'doctor' => $doctor,
        ]);
    }
}

<?php

namespace App\Http\Livewire\Admin;

use App\Models\Pharmacist as ModelsPharmacist;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class Pharmacist extends Component
{
    public $addPharmacist = false;
    public $editPharmacist = false;
    public  $firstName, $lastName, $email, $license, $company, $address;
    public $pharmacistId, $userId;
    use WithPagination;

    protected $rules = [
        'firstName' => 'required|string',
        'lastName' => 'required|string',
        'company' => 'required|string',
        'address' => 'required|string',
        'email' => 'required|email|unique:users,email',
        'license' => 'required'
    ];

    public function createPharmacist()
    {
        $this->validate();

        $id = User::create([
            'fname' => $this->firstName,
            'lname' => $this->lastName,
            'email' => $this->email,
            'user_type' => 'Pharmacist',
            'password' => Hash::make('password234'),
        ])->id;

        ModelsPharmacist::create([
            'user_id' => $id,
            'license_no' => $this->license,
            'work_name' => $this->company,
            'work_address' => $this->address
        ]);
        return redirect()->route('admin.pharmacist');
    }


    public function pharmacistEdit($id)
    {
        $this->editPharmacist = true;
        $singlePharmacist = ModelsPharmacist::find($id);
        $this->license = $singlePharmacist->license_no;
        $this->company = $singlePharmacist->work_name;
        $this->address =  $singlePharmacist->work_address;
        $this->userId = $singlePharmacist->user_id;
        $this->pharmacistId = $id;

        $singleUser = User::find($this->userId);
        $this->firstName = $singleUser->fname;
        $this->lastName = $singleUser->lname;
        $this->email = $singleUser->email;
    }

    public function updatePharmacist()
    {
        User::where('id', $this->userId)->update([
            'fname' => $this->firstName,
            'lname' => $this->lastName,
            'email' => $this->email,
        ]);

        ModelsPharmacist::where('id', $this->pharmacistId)->update([
            'license_no' => $this->license,
            'work_name' => $this->company,
            'work_address' => $this->address
        ]);
    }

    public function deletePharmacist($id){
        ModelsPharmacist::where('id', $id)->delete();
    }

    public function render()
    {
        $pharmacist = ModelsPharmacist::with('user')->paginate(4);
        return view('livewire.admin.pharmacist', [
            'pharmacist' => $pharmacist,
        ]);
    }
}

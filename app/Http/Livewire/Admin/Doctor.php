<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Doctor extends Component
{
    public function render()
    {
        $doctor = Doctor::with('user')->get();
        return view('livewire.admin.doctor', [
            'doctor' => $doctor,
        ]);
    }
}

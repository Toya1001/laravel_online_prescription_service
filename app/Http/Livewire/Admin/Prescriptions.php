<?php

namespace App\Http\Livewire\Admin;

use App\Models\Prescription;
use Livewire\Component;
use Livewire\WithPagination;

class Prescriptions extends Component
{
    use WithPagination; 

    public function render()
    {
        $prescriptions = Prescription::with('patient', 'doctor', 'drug')->orderByDesc('id')->paginate(5);
        return view('livewire.admin.prescriptions', [
            'prescription' => $prescriptions,
        ]);
    }
}

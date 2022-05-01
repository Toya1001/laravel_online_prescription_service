<?php

namespace App\Http\Livewire\Pharmacist;

use App\Models\PrescriptionOrder;
use Livewire\Component;

class Orders extends Component
{
    public function render()
    {
        
        return view('livewire.pharmacist.orders',[
            'orders' => PrescriptionOrder::with('patient', 'prescriptions')->orderByDesc('id')->get(),
        ]);
    }
}

<?php

namespace App\Http\Livewire\Pharmacist;

use App\Models\MedicalHistory;
use App\Models\Patient;
use Livewire\Component;

class Patients extends Component
{
    public $history = false;

    public function medicalHistory($id)
    {
        $this->history = true;
        // dd($id);
        $this->historyData = MedicalHistory::find($id);
        // dd($this->historyData);
        $this->allergies = $this->historyData->allergies ?? "";
        $this->illness = $this->historyData->health_conditions ?? "";
        if ($this->historyData->pregnant_nursing ?? "") {
            $this->pregnant = "Yes";
        }
        $this->pregnant = "No";
        $this->medicalHistoryId = $id;
        $this->patientId = $this->historyData->id ?? "";
    }

    
    public function render()
    {
        $patient = Patient::with('medicalHistory')->get();
        // dd($patient);
        return view('livewire.pharmacist.patients', [
            'patient' => $patient,
        ]);
    }
}

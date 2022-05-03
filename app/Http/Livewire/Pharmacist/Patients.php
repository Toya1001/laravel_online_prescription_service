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
        // dd($this->historyData['Patient']['allergies']);
        $this->allergies = $this->historyData->allergies ?? "";
        $this->illness = $this->historyData->health->conditions ?? "";
        if ($this->historyData->pregnant_nursing ?? "") {
            $this->pregnant = "Yes";
        }
        $this->pregnant = "No";
        $this->medicalHistoryId = $id;
        $this->patientId = $this->historyData->id ?? "";
    }
    public function render()
    {
        $patient = Patient::all();
        return view('livewire.pharmacist.patients', [
            'patient' => $patient,
        ]);
    }
}

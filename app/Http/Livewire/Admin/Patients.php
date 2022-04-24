<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\Http;

use Livewire\Component;
use Livewire\WithPagination;

class Patients extends Component
{
    use WithPagination;
    public $history = false;
    public $historyData, $allergies, $illness, $pregnant, $medicalHistoryId, $patientId;  

    public function medicalHistory($id)
    {
        $this->history = true;
        // dd($id);
        $this->historyData = Http::get('http://192.168.0.2:8080/api/history/'.$id)->json();
        // dd($this->historyData['Patient']['allergies']);
        $this->allergies = $this->historyData['Patient']['allergies']?? "";
        $this->illness = $this->historyData['Patient']['health_conditions'] ?? "";
        if($this->historyData['Patient']['pregnant_nursing']??""){
            $this->pregnant = "Yes";
        }
        $this->pregnant = "No";
        $this->medicalHistoryId = $id;
        $this->patientId =$this->historyData['Patient']['id']?? "";
        
    }

    public function updateMedicalHistory()
    {
        if($this->pregnant === "Yes")
        {
         $this->pregnant = 1;
        } else
        {
        $this->pregnant = 0;
        }

        if(is_null($this->patientId)){
            Http::post('http://192.168.0.2:8080/api/history', [
                'allergies' => $this->allergies,
                'health_conditions' => $this->illness,
                'pregnant_nursing' => $this->pregnant
            ]);
        }

        Http::put('http://192.168.0.2:8080/api/history/'.$this->medicalHistoryId, [
            'patient_id'=>$this->patientId,
            'allergies' => $this->allergies,
            'health_conditions' =>$this->illness,
            'pregnant_nursing' => $this->pregnant
        ]);
        return redirect()->route('admin.patient');
    }

    public function render()
    {
        $patient = Http::get('http://192.168.0.2:8080/api/patient')->collect();
    //    dd($patient);
        return view('livewire.admin.patients', ['patient' =>$patient,]);
    }
}

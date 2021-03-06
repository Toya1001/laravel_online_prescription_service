<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'drug_id',
        'dosage',
        'rx_no',
        'quantity',
        'directions',
        'duration',
        'repeat',
        'is_active'
    ];

    public function patient(){
        return $this->belongsTo(Patient::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
    
    public function drug()
    {
        return $this->belongsTo(Drug::class, 'drug_id');
    }

    public function prescriptionOrder(){
        return $this->hasMany(PrescriptionOrder::class);
    }
}

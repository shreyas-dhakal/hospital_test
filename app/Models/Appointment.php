<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'gender',
        'email',
        'phone',
        'department_id',
        'doctor_id',
        'appointment_date',
        'start_time',
        'end_time',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }
}

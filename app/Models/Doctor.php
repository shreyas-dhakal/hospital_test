<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Doctor extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
            'name',
            'designation',
            'image',
            'description',
            'nmc_reg',
            'department_id' // Add department_id to the fillable fields
    ];

    public function Sluggable():array
    {
        return 
        [
            'slug'=>
            [
                'source' => 'name'
            ]
        ];
    }

    public function department()
    {
        return $this->belongsTo(Department::class); // Define the relationship: Doctor belongs to a Department
    }
    public function availabilities()
    {
        return $this->hasMany(DoctorAvailability::class);
    }
}

<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Department extends Model
{
    use HasFactory;

    use Sluggable;

    protected $fillable = [
            'name',
            'image',
            'description'
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

    public function doctors()
    {
        return $this->hasMany(Doctor::class); // Define the relationship: Department has many Doctors
    }
}


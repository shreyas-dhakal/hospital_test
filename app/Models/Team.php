<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Team extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
            'name',
            'designation',
            'image',
            'description',
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

}

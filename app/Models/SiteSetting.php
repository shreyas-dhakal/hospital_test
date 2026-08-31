<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'logo', 'name', 'address', 'email1', 'email2', 'phone_number1', 'phone_number2', 'image', 'link1', 'link2', 'link3',
    ];
}

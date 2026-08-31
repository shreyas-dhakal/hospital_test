<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;
    protected $fillable = [
        'logo',
        'footer',
        'story_image',
        'story1',
        'story2',
        'vision_image',
        'vision',
        'greeting_image',
        'greeting',
        'message_image',
        'message',
    ];
}

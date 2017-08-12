<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Dojo extends Model
{
    protected $casts = [
        'info' => 'array'
    ];

    protected $attributes = [
        'name' => '',
        'url' => '',
        'info' => '{
            "address": "",
            "shortDescription": "",
            "classes": "",
            "info": "",
            "timetable": []
        }',
        'teacher_id' => null,
        'latitude' => null,
        'longitude' => null
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dojo extends Model
{
    protected $casts = [
        'info' => 'array',
    ];
}

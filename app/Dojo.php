<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Dojo extends Model
{
    protected $casts = [
        'info' => 'array',
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
}

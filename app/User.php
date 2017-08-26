<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    private $isAdmin = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setIsAdmin (User $userToUpdate, $isAdmin)
    {
        if ($this->attributes['isAdmin'] === 1) {
            $userToUpdate->attributes['isAdmin'] = $isAdmin;
        }
    }
}

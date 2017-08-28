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
        'name', 'email', 'password', 'info', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'info' => 'array'
    ];

    protected $attributes = [
        'info' => '{}'
    ];

    public function setIsAdmin (User $userToUpdate, $isAdmin)
    {
        if ($this->attributes['isAdmin'] === 1) {
            $userToUpdate->attributes['isAdmin'] = $isAdmin;
        }
    }

    public function getAvatarUrl()
    {
        if ($this->attributes['avatar']) {
            return $this->attributes['avatar'];
        }
        return "../../images/shared/user-image-with-black-background_318-34564.jpg";
    }

    public function getDescription()
    {
        if (isset($this->getInfo()['userDescription'])) {
            return $this->getInfo()['userDescription'];
        }
        return "";
    }

    public function getInfo()
    {
        return json_decode($this->attributes['info'], true);
    }
}

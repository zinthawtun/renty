<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use Uuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function verifyUser()
    {
        return $this->hasOne('App\VerifyUser');
    }

    public function message_board()
    {
        return $this->hasOne('App\Category', 'user_id', 'id');
    }

    public function property()
    {
        return $this->hasOne('App\Property', 'user_id', 'id');
    }



    public $incrementing = false;
}

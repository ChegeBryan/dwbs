<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'mobile', 'is_employer', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    // define a one-to-many relationship for employer and jobs
    public function jobs()
    {
        return $this->hasMany('App\Job');
    }

    // define a one-to-many relationship for candidate and jobs
    public function applications()
    {
        return $this->hasMany('App\Application');
    }
}

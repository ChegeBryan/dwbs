<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'employer_id',
        'category',
        'title',
        'type',
        'description',
        'salary',
        'county',
        'town',
        'address',
        'status',
    ];

    // define a one-to-many reverse relationship between users and jobs
    public function user()
    {
        return $this->belongsTo('App\User', 'employer_id');
    }

    // define a one-to-many relationship between jobs and applications
    public function applications()
    {
        return $this->hasMany('App\Application');
    }
}

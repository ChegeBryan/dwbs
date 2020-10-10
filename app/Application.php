<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'candidate_id',
        'job_id',
        'status',
    ];

    // define a one-to-many(reverse) relationship between applications and job
    public function job()
    {
        return $this->belongsTo('App\Job');
    }

    // define a one-to-many(reverse) relationship between users and applications
    public function candidate()
    {
        return $this->belongsTo('App\User', 'candidate_id');
    }
}

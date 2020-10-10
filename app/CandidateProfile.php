<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidateProfile extends Model
{
    protected $fillable = [
        'candidate_id',
        'category',
        'title',
        'type',
        'salary',
        'county',
        'town',
        'status',
    ];

    // define a one-to-one (inverse) relationship user and candidate profile
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

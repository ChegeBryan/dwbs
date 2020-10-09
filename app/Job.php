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
        'compensation',
        'county',
        'town',
        'address',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

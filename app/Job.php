<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'description',
        'type',
        'location',
        'industry',
    ];

    public function company()
    {
        return $this->belongsTo('App\Company');
    }
}

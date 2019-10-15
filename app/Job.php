<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'title',
        'salary',
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

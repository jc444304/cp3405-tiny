<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'title',
        'description',
        'type',
        'location',
        'industry',
        'category_id',
        'salary',
    ];

    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    public function category()
    {
        return $this->hasOne('App\JobCategory');
    }
}

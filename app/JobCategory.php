<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    protected $fillable = [
        'title',
    ];

    public function job()
    {
        return $this->belongsTo('App/Job', 'category_id');
    }
}

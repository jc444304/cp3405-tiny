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
        return $this->hasMany('App/JobCategory', 'category_id');
    }
}

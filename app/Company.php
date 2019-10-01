<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /**
     * Fields that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'name','email','aboutus','address','website'
    ];

    /**
     * Get the user that is a company.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

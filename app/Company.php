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
        'name','email','aboutus','address'
    ];

    /**
     * Get the user that is a student.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

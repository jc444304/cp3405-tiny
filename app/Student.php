<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /**
     * Fields that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'jcu_id','name','email','aboutme','education','experience','certifications'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'jcu_id'
    ];

    /**
     * Get the user that is a student.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

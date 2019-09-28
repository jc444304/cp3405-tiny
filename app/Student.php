<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /**
     * Get the user that is a student.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    /**
     * Fields that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'faculty','name','email','image'
    ];

    /**
     * Get the user that is a teacher.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function profileImage() {
        return ($this->image) ? '/storage/' . $this->image : '/images/no-image-available.png';
    }
}

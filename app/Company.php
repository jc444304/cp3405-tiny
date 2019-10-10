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
        'name','email','aboutus','address','website','image'
    ];

    /**
     * Get the user that is a company.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function profileImage() {
        return ($this->image) ? '/storage/' . $this->image : '/images/no-image-available.png';
    }
}

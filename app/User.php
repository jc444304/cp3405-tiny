<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'user_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($user) {
            $user->profile()->create([
                'title' => 'James Cook University',
                'description' => 'This is where my description goes',
                'url' => 'https://website.com'
            ]);
        });
    }

    public function student()
    {
        return $this->hasOne('App\Student');
    }

    public function company()
    {
        return $this->hasOne('App\Company');
    }

    public function teacher()
    {
        return $this->hasOne('App\Teacher');
    }

    public function profile()
    {
        $profile = $this;
        switch ($this->user_type)
        {
            case 'student':
                $profile = $this->student()->get();
                break;
            case 'company':
                $profile = $this->company()->get();
                break;
            case 'teacher':
                $profile = $this->teacher()->get();
                break;
        }
        return $profile[0];
    }
}

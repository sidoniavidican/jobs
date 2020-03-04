<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Storage;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    public function jobs()
    {
        return $this->hasMany('App\Job');
    }

    public function applications()
    {
        return $this->belongsToMany('App\Job', 'applications')->withTimestamps();
    }

    public function hasApplication($job)
    {
        foreach ($this->applications()->get() as $application) {
            if ($application->id == $job->id) {
                return true;
            }
        }
        return false;
    }

    public function notifications()
    {
        return $this->hasMany('App\Notification');
    }

    public function hasNotification($category, $city)
    {
        foreach ($this->notifications()->get() as $notification) {
            if ($notification->city_id == $city && $notification->category_id == $category) {
                return true;
            }
        }
        return false;
    }

    public function hasCV()
    {
        $cv = Storage::files('cv/'.$this->id);
        return count($cv);
    }
}

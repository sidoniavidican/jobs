<?php

namespace App;

use App\Events\JobCreated;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $dispatchesEvents = [
        'created' => JobCreated::class
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'city_id', 'user_id', 'category_id', 'min', 'max'
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }
    
    public function applications()
    {
        return $this->belongsToMany('App\User', 'applications')->withTimestamps();
    }

    /**
     * Set the jobs image.
     *
     * @param  string  $value
     * @return void
     */
    public function getImageAttribute()
    {
        return '/img/images.jpg';
    }
}

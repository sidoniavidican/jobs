<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'job_id', 'user_id', 'created_at'
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function job()
    {
        return $this->belongsTo('App\Job');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Activity extends Model
{
    protected $fillable = [
        'name', 'remark','created_at','updated_at',
    ];

    public function scopeActivity($query)
    {
    	return $query->orderBy('id','desc');
    }

    public function users()
    {
    	return $this->belongsTo('App\Users', 'user');
    }

    public function activityUpdates(){
    	return $this->hasMany('App\ActivityUpdates');
    }

    // public function activityUrl()
    // {
    // 	return url($this->id.'/'. Str::slug($this->name));
    // }
}

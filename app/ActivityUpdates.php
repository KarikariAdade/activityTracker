<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class ActivityUpdates extends Model
{
    public function activity()
    {
    	return $this->belongsTo('App\Activity', 'activity_id');
    }
    public function scopeActivity($query)
    {
    	return $query->all();
    }
}

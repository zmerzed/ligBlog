<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventDetail extends Model
{
    protected $table = 'eventsDetail';
    protected $fillable = ['event_id', 'event_date', 'created_at', 'updated_at'];

    public function event()
    {
        return $this->belongsTo('App\Event', 'event_id', 'id');
    }
}

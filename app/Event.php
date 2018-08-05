<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'eventsMaster';
    protected $fillable = ['name'];

    public function details()
    {
        return $this->hasMany('App\EventDetail', 'event_id', 'id');
    }
}

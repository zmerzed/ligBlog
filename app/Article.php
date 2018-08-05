<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{
    public $table = 'articles';
    public $appends = ['proper_time', 'image_path'];

    public function getProperTimeAttribute()
    {
    	$properTime = $this->created_at->format('Y-m-d');

    	return $properTime;
    }

    public function getImagePathAttribute()
    {
    	$imagePath = url('storage/') . "/{$this->image}";

    	return $imagePath;
    }
}

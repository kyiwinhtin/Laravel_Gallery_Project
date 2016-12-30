<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
	protected $fillable = ['gallery_name' , 'created_by' , 'post_by'];

    public function images()
    {
    	return $this->hasMany('App\Image');
    }
    
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}

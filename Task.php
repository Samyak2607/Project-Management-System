<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Task extends Model
{
	   protected $table = 'task';
	
	 protected $fillable = [
        
        'title', 'observer', 'details','user_id'
    ];

    public function observer_name(){
    	return $this->belongsTo('App\User','observer');
    }
}

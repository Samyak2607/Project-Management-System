<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class Project extends  Model
{
    	 protected $fillable = [
        
        'title', 'company_name', 'details',
    ];
}

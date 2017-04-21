<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // Can insert attrtibutes that are mass assignable V
    protected $fillable = ['name'];
    // protected fillable protects fields that you want to allow to update
    
    public function(user)
    {
    	return $this->belongsTo(User::class);
    }

}

<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'content', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
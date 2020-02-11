<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function employees()
    {
        return $this->hasMany('App\Employee');
        // return $this->hasMany('App\Comment', 'foreign_key', 'local_key');
    }
}

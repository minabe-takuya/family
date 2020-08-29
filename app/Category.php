<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['type', 'user_id'];

    public function events()
        {
            return $this->hasMany('App\Event');
        }
}

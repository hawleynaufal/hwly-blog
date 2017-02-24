<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table='blog_post';
    public function comments()
   {
     return $this->hasMany('App\Comment');
   }
}

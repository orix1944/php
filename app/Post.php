<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
          'user_id',  'category_id', 'content', 'title'
    ];


    // public function comments(){

    //   return $this->hasMany(\App\Comment::class, 'post_id', 'id');
    // }

    public function category(){

      return $this->belongsTo(\App\Category::class, 'category_id');
    }

    public function user(){

      return $this->belongsTo(\App\User::class, 'user_id');
    }


}
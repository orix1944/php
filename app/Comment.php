<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */

     protected $fillable = [
        'user_id',  'post_id', 'comment'
    ];
}

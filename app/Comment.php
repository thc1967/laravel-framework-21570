<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [ 'post_id', 'user_id', 'body' ];
    
    protected $touches = ['post'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}

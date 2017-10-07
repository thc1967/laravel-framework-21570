<?php

namespace App;

use App\Scopes\PostUserScope;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [ 'user_id', 'subject', 'body' ];
    
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new PostUserScope);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}

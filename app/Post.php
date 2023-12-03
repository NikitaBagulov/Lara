<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $fillable = ['title', 'content', 'user_id', 'is_published', 'publish_at'];
    protected $casts = [
        'title'=> 'string',
        'content'=> 'string',
        'user_id'=>'integer',
        'is_published'=> 'boolean',

    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}

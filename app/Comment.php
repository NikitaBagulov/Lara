<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;
    protected $fillable = ['content', 'commentable_type', 'commentable_id'];
    protected $casts =[
        'content'=> 'string',
    ];
    public function commentable()
    {
        return $this->morphTo();
    }
}

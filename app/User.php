<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use SoftDeletes;
    protected $fillable = [
        "name","lastname","email","age", "city"
    ];

    protected $casts =[
        "name"=> "string",
        "lastname"=> "string",
        "email"=> "string",
        "city"=> "string",
        "age"=>"integer"
    ];

    public function role()
    {
        return $this->belongsToMany(Role::class, "users_and_roles", 'user_id', 'role_id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'user_id');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function scopeUsersWithRoles($query){
        return $query->with('role')->get();
    }
}

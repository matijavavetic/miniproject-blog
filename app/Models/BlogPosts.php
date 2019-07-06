<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPosts extends Model
{
    protected $fillable = [
        'title', 'body', 'image', 'user_id'
    ];

    protected $guarded = [];

    public function path()
    {
        return "/blog/{$this->id}";
    }
}

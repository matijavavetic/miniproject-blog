<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogPosts extends Model
{
    protected $fillable = [
        'title', 'body', 'image'
    ];

    protected $guarded = [];

    public function path()
    {
        return "/blog/{$this->id}";
    }
}

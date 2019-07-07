<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPosts extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'body', 'image', 'user_id'
    ];

    /**
     * The attributes inside the array are not mass-assignable
     *
     * @var array
     */
    protected $guarded = [];


    /**
     * Get the path to a blog post
     *
     * @return string
     */
    public function path()
    {
        return "/blog/{$this->id}";
    }

    /**
     * Get the blog posts that user created
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

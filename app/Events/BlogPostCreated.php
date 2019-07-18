<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class BlogPostCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $blogPost;

    public $user;

    /**
     * Create a new event instance.
     *
     * @param $user
     * @param $blogPost
     * @return void
     */
    public function __construct($blogPost, $user)
    {
        $this->blogPost = $blogPost;
        $this->user = $user;
    }
}

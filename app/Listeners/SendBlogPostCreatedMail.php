<?php

namespace App\Listeners;

use App\Events\BlogPostCreated;
use App\Mail\BlogPostCreatedMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendBlogPostCreatedMail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  BlogPostCreated  $event
     * @return void
     */
    public function handle(BlogPostCreated $event)
    {
        Mail::to($event->user['email'])->send(
            new BlogPostCreatedMail($event->blogPost, $event->user));
    }
}

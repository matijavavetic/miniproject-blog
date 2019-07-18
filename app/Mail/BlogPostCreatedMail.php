<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BlogPostCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $blogPost;

    public $user;

    /**
     * Create a new message instance.
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

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.postcreated');
    }
}

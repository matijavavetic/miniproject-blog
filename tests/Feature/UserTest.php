<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\BlogPosts;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function non_registered_user_cannot_see_blog_index()
    {
        $this->get('/blog')->assertRedirect('login');
    }
}


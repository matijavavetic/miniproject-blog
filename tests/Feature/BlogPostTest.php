<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\BlogPosts;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BlogPostTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test */
    public function a_user_can_create_a_new_blog_post()
    {
        $this->actingAs(factory('App\Models\User')->create());

        $blogPost = factory('App\Models\BlogPosts')->make();

        $this->post($blogPost->path(),$blogPost->toArray());

        $this->assertEquals(1,BlogPosts::all()->count());
    }

    /** @test */
    public function a_user_can_read_all_blog_posts()
    {
        $this->actingAs(factory('App\Models\User')->create());

        $blogPost = factory('App\Models\BlogPosts')->create();

        $response = $this->get('/blog');

        $response->assertSee($blogPost->title);
    }

    /** @test */
    public function a_user_can_delete_their_blog_post()
    {
        $this->actingAs(factory('App\Models\User')->create());

        $blogPost = factory('App\Models\BlogPosts')->create(['user_id' => auth()->id()]);

        $this->delete($blogPost->path());

        $this->assertDatabaseMissing('blog_posts',['id'=> $blogPost->id]);
    }

    /** @test */
    public function a_user_can_update_their_blog_post()
    {
        $this->actingAs(factory('App\Models\User')->create());

        $blogPost = factory('App\Models\BlogPosts')->create(['user_id' => auth()->id()]);

        $blogPost->title = "New blog post title";

        $this->patch($blogPost->path(), $blogPost->toArray());

        $this->assertDatabaseHas('blog_posts',['id'=> $blogPost->id , 'title' => 'New blog post title']);
    }
}

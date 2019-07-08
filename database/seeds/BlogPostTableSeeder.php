<?php

use Illuminate\Database\Seeder;
use App\Models\BlogPosts;

class BlogPostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 100;
        factory(BlogPosts::class, $count)->create()->each(function ($blogPost) {
            $blogPost->make();
        });
    }
}
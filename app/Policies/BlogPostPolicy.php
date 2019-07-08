<?php

namespace App\Policies;

use App\Models\User;
use App\Models\BlogPosts;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogPostPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any blog posts.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the blog posts.
     *
     * @param  \App\Models\User  $user
     * @param  \App\BlogPosts  $blogPosts
     * @return mixed
     */
    public function view(User $user, BlogPosts $blogPosts)
    {
        //
    }

    /**
     * Determine whether the user can create blog posts.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine if the user may update the project.
     *
     * @param  User    $user
     * @param  BlogPosts $blogPost
     * @return bool
     */
    public function update(User $user, BlogPosts $blogPost)
    {
        return $user->id == $blogPost->user_id;
    }

    /**
     * Determine whether the user can delete the blog posts.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BlogPosts  $blogPosts
     * @return mixed
     */
    public function delete(User $user, BlogPosts $blogPost)
    {
        return $user->id == $blogPost->user_id;
    }

    /**
     * Determine whether the user can restore the blog posts.
     *
     * @param  \App\Models\User  $user
     * @param  \App\BlogPosts  $blogPosts
     * @return mixed
     */
    public function restore(User $user, BlogPosts $blogPosts)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the blog posts.
     *
     * @param  \App\Models\User  $user
     * @param  \App\BlogPosts  $blogPosts
     * @return mixed
     */
    public function forceDelete(User $user, BlogPosts $blogPosts)
    {
        //
    }
}

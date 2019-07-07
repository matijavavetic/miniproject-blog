<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPosts;
use App\Http\Requests\BlogPostRequest;

class BlogPostsController extends Controller
{

    /**
     * Retrieve all blog posts
     *
     * @param \App\Models\BlogPosts $blogPosts
     * @return \Illuminate\Http\Response
     */
    public function index(BlogPosts $blogPosts)
    {
        $blogPostsCollection = $blogPosts->all();

        return $this->responseFactory->view('blog.index', compact('blogPostsCollection'));
    }

    /**
     * Returns view to create a new blog post
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->responseFactory->view('blog.create');
    }


    /**
     * Stores a newly created blog post into database
     *
     * @param BlogPostRequest $request
     * @return BlogPostRequest|\Illuminate\Http\Response
     */
    public function store(BlogPostRequest $request)
    {
        $data = $request->validationData();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('blogimages', $filename);
            $data['image'] = $filename;
        }

        $blogPost = new BlogPosts();

        $blogPost->create($data);

        return $this->responseFactory->view('home');
    }

    /**
     * Find blog post by id and edit it
     *
     * @param \App\Models\BlogPosts $blogPosts
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(BlogPosts $blogPosts, int $id)
    {
        $blogPost = $blogPosts->findOrFail($id);

        $this->authorize('update', $blogPost);

        return $this->responseFactory->view('blog.edit', compact('blogPost'));
    }

    /**
     * Find blog post by id and update it
     *
     * @param \App\Http\Requests\BlogPostRequest $request
     * @param \App\Models\BlogPosts $blogPosts
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(BlogPostRequest $request, BlogPosts $blogPosts, int $id)
    {
        $blogPost = $blogPosts->findOrFail($id);

        $this->authorize('update', $blogPost);

        $data = $request->validationData();

        $blogPost->update($data);

        return $this->responseFactory->redirectToAction('BlogPostsController@edit', ['id' => $id]);
    }
}
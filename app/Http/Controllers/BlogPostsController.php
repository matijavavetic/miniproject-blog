<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPosts;
use App\Http\Requests\BlogPostRequest;

class BlogPostsController extends Controller
{
    public function index(BlogPosts $blogPosts)
    {
        $blogPostsCollection = $blogPosts->all();

        return $this->responseFactory->view('blog.index', compact('blogPostsCollection'));
    }

    public function create()
    {
        return $this->responseFactory->view('blog.create');
    }

    public function store(BlogPostRequest $request)
    {
        $data = $request->validationData();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/images', $filename);
            $data['image'] = $filename;
        } else {
            return $request;
            $data['image'] = '';
        }

        $blogPost = new BlogPosts();

        $blogPost->create($data);

        return $this->responseFactory->view('home');
    }

    public function edit(BlogPosts $blogPosts, $id)
    {
        $blogPost = $blogPosts->findOrFail($id);

        return $this->responseFactory->view('blog.edit', compact('blogPost'));
    }

    public function update(BlogPostRequest $request, BlogPosts $blogPosts, $id)
    {
        $blogPost = $blogPosts->findOrFail($id);

        $blogPost->update($request->validationData());

        return $this->responseFactory->view('blog.edit', compact('blogPost'));
    }
}
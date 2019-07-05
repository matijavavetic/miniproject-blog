<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogPosts;

class BlogPostsController extends Controller
{
    public function index()
    {
        $blogPosts = BlogPosts::all();

        return view('blog.index', compact('blogPosts'));
    }

    public function create()
    {
        return view('blog.create');
    }

    public function store(Request $request)
    {
        $blogPost = new BlogPosts();

        $blogPost->title = $request->input('title');
        $blogPost->body = $request->input('body');
        $blogPost->image = $request->input('image');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/images', $filename);
            $blogPost->image = $filename;
        } else {
            return $request;
            $blogPost->image = '';
        }

        $blogPost->save();

        return view('home');
    }
}

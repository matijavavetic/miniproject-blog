@extends('layouts.app')

@section('content')

    <header class="flex items-center mb-3 pb-4">
        <div class="flex justify-between items-end w-full">
            <h1>Blog index</h1>

            <a href="/blog/create" class="button">Add post</a>
        </div>
    </header>

    <div class="card flex flex-col" style="height: 200px">
        @foreach ($blogPostsCollection as $blogPost)
        <h3 class="font-normal text-xl py-4 -ml-5 mb-3 border-l-4 border-accent-light pl-4">
            <a href="#">{{ $blogPost->title }}</a>
        </h3>

        <p>
            <a href="{{ $blogPost->path() }}/edit">Edit</a>
        </p>

        <h3>{{ $blogPost->author->first_name }}</h3>

        <div class="mb-4 flex-1">{{ str_limit($blogPost->body, 100) }}</div>

        <td> <img src="{{ asset('uploads/images/' . $blogPost->image) }}" /> </td>
        @endforeach
    </div>




@endsection
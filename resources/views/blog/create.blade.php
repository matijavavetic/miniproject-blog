@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Add a new blog post</h1>
    <form action="/blog" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" placeholder="Enter blog post title">
        </div>

        <div class="form-group">
            <label>Text</label>
            <input type="text" name="body" class="form-control" placeholder="Enter blog post text">
        </div>

        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" class="form-control" placeholder="Enter title">
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link mr-2">Add post!</button>

                <a href="/blog">Cancel</a>
            </div>
        </div>

    </form>
</div>


@endsection
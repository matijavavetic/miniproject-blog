@extends('layouts.app')

@section('content')
    <h1 class="title">Edit blog post</h1>

    <form method="POST" action="{{ $blogPost->path() }}" style="margin-bottom: 1em;">
        @method('PATCH')
        {{ csrf_field() }}

        <div class="field">
            <label class="label" for="title">Title</label>

            <div class="control">
                <input type="text" name="title" class="input" placeholder="Title" value="{{ $blogPost->title }}">
            </div>

            <div class="field">
                <label class="label" for="body">Body</label>

                <div class="control">
                    <input type="text" name="body" class="input" placeholder="Body" value="{{ $blogPost->body }}">
                </div>

                <div class="control">
                    <input type="file" name="image" class="form-control" placeholder="Upload image">
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <button type="submit" class="button is-link">Update blog post</button>
                </div>
            </div>
        </div>
    </form>
@endsection
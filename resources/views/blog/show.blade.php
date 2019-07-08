@extends ('layouts.app')

@section('content')
    <header class="flex items-center mb-3 pb-4">
        <div class="flex justify-between items-end w-full">
            <h1>{{ $blogPost->title }}</h1>
            <h3>{{ $blogPost->author->first_name }}</h3>
        </div>
    </header>

    <div class="card flex flex-col" style="height: 200px">
            <p>
                <a href="{{ $blogPost->path() }}/edit">Edit</a>
            <form method="POST" action="{{ $blogPost->path() }}" class="text-right">
                @method('DELETE')
                @csrf
                <button type="submit" class="text-xs">Delete</button>
            </form>
            </p>

            <div class="mb-4 flex-1">{{ $blogPost->body }}</div>

            <td> <img src="{{ asset('storage/blogimages/'.$blogPost->image) }}" /> </td>
    </div>
@endsection

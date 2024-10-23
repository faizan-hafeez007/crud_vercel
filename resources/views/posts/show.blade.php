<!-- resources/views/posts/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->content }}</p>
        
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back to Posts</a>
        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>

        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
    </div>
@endsection

<!-- resources/views/welcome.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center">Welcome to Laravel CRUD!</h1>
                    <p class="text-center">This is a simple CRUD application built with Laravel.</p>
                    <p class="text-center">
                        <a href="{{ route('posts.index') }}" class="btn btn-primary">View Posts</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
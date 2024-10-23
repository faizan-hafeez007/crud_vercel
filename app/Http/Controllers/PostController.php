<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all posts from the database
        $posts = Post::all();

        // Return the index view and pass the posts data
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return the form view for creating a new post
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        // Create a new post record in the database
        Post::create($request->all());

        // Redirect to the posts index with success message
        return redirect()->route('posts.index')
                         ->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find the post by ID
        $post = Post::findOrFail($id);

        // Return the show view and pass the post data
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Find the post by ID
        $post = Post::findOrFail($id);

        // Return the edit view and pass the post data
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the updated data
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        // Find the post by ID and update it
        $post = Post::findOrFail($id);
        $post->update($request->all());

        // Redirect to the posts index with success message
        return redirect()->route('posts.index')
                         ->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the post by ID and delete it
        $post = Post::findOrFail($id);
        $post->delete();

        // Redirect to the posts index with success message
        return redirect()->route('posts.index')
                         ->with('success', 'Post deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = \App\Models\Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        // Create a new post using the validated data
        $post = \App\Models\Post::create($validatedData);

        // Redirect to the posts index page with a success message
        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    public function show($id)
    {
        $post = \App\Models\Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function edit($id)
    {
        $post = \App\Models\Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        // Find the post by ID and update it with the validated data
        $post = \App\Models\Post::findOrFail($id);
        $post->update($validatedData);

        // Redirect to the posts index page with a success message
        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }
    public function destroy($id)
    {
        $post = \App\Models\Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }
}

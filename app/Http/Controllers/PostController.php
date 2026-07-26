<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        // ✅ التشييك في الأول خالص
        if (Auth::check() && Auth::user()->email === $post->email) {
            return view('posts.edit', compact('post'));
        }

        return redirect()->route('posts.index')->with('error', 'You are not authorized to edit this post.');
    }

    public function update(Request $request, $id)
    {
        $post = \App\Models\Post::findOrFail($id);

        // ✅ 1. التشييك الأول: هل اليوزر صاحب البوست؟
        if (!Auth::check() || Auth::user()->email !== $post->email) {
            return redirect()->route('posts.index')->with('error', 'You are not authorized to update this post.');
        }

        // ✅ 2. الـ Validation
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        // ✅ 3. الحفظ والتعديل الفعلي
        $post->update($validatedData);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }

    public function destroy($id)
    {
        $post = \App\Models\Post::findOrFail($id);

        // ✅ التشييك قبل الحذف الفعلي
        if (!Auth::check() || Auth::user()->email !== $post->email) {
            return redirect()->route('posts.index')->with('error', 'You are not authorized to delete this post.');
        }

        // الحذف الفعلي بعد التأكد
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }
}

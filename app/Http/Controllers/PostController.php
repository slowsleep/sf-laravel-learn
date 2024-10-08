<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();

        return view('post/index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();

        return view('post/create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content_text' => 'required',
            'author' => 'required',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content_text;
        $post->author = $request->author;
        $post->save();

        return redirect('post');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $post = Post::with('user')->find($id);

        return view('post/show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        $users = User::all();

        return view('post/edit', compact('post', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'content_text' => 'required',
            'author' => 'required',
        ]);

        $post = Post::find($id);
        $post->title = $request->title;
        $post->content = $request->content_text;
        $post->author = $request->author;
        $post->save();

        return view('post/show', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect('post');
    }
}

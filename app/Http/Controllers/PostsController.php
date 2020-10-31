<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.post', [
            'post' => $post
        ]);
    }

    public function index()
    {
        $posts = Post::all()->sortByDesc('created_at');

        return view('home', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3|max:255',
            'descr' => 'nullable|max:255',
            'img' => 'required|ends_with:.jpg',
            'user_id' => 'required'
        ]);

        $post = new Post();

        $post->title = $request->input('title');
        $post->descr = $request->input('descr');
        $post->img = $request->input('img');

        $post->user_id = $request->input('user_id');

        $post->save();

        return redirect('/');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.edit', [
            'post' => $post
        ]);
    }

    public function update($id)
    {
        request()->validate([
            'title' => 'required|min:3|max:255',
            'descr' => 'max:255',
            'user_id' => 'required'
        ]);

        $post = Post::findOrFail($id);

        $post->title = request('title');
        $post->descr = request('descr');

        $post->user_id = request('user_id');

        $post->save();

        redirect('/posts/' . $post->id);
    }

    public function destroy()
    {

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function show($id)
    {
        $post = Posts::findOrFail($id);

        return view('posts.post', [
            'post' => $post
        ]);
    }

    public function index()
    {
        $posts = Posts::all()->sortByDesc('created_at');

        return view('home', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        request()->validate([
            'title' => 'required|min:3|max:255',
            'descr' => 'max:255',
            'img' => 'required',
            'user_id' => 'required'
        ]);

        $post = new Posts();

        $post->title = request('title');
        $post->descr = request('descr');
        $post->img = request('img');

        $post->user_id = request('user_id');

        $post->save();

        return redirect('/');
    }

    public function edit($id)
    {
        $post = Posts::findOrFail($id);

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

        $post = Posts::findOrFail($id);

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

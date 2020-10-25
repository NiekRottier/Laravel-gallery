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
        $post = new Posts();

        $post->title = request('title');
        $post->descr = request('descr');
        $post->img = request('img');

        $post->user_id = request('user_id');

        $post->save();

        return redirect('/');
    }

    public function edit()
    {

    }

    public function destroy()
    {

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\DB;

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
        $posts = Post::where('active', 1)
            ->latest()
            ->get();

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
            'img' => 'required|ends_with:.jpg,.jpeg,.png,.gif',
        ]);

        $post = new Post();

        $post->title = $request->input('title');
        $post->descr = $request->input('descr');
        $post->img = $request->input('img');

        $post->user_id = Auth::id();

        $post->save();

        // Update num_of_posts of user
        $user = User::whereId(Auth::id())->first();
        $user->num_of_posts++;
        $user->save();

        return redirect('/');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $this->authorize('editPost', $post);

        return view('posts.edit', [
            'post' => $post
        ]);
    }

    public function update($id)
    {
        request()->validate([
            'title' => 'required|min:3|max:255',
            'descr' => 'max:255'
        ]);

        $post = Post::findOrFail($id);

        $post->title = request('title');
        $post->descr = request('descr');

        $post->save();

        return redirect('/posts/' . $post->id);
    }

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'max:255'
        ]);

        $search = $request->input('search');

        $posts = Post::where('title', 'LIKE', '%'.$search.'%')->latest()->get();

        return view('home', [
            'posts' => $posts
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Like;
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
        $likes = Like::where('post_id', $id)->get()->count();

        return view('posts.post', [
            'post' => $post,
            'likes' => $likes
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
            'img' => 'required|ends_with:.jpg,.jpeg,.png,.gif'
        ]);

        $post = new Post();

        $post->title = $request->input('title');
        $post->descr = $request->input('descr');
        $post->img = $request->input('img');
        $post->tags = $request->input('tags');

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
            'search' => 'max:255',
            'tags' => 'nullable'
        ]);

        // Put search inputs in variables
        $search = $request->input('search');
        $tags = $request->input('tags');

        // Different queries when filtering with or without tags
        if ($tags == null){
            $posts = Post::where('title', 'LIKE', '%'.$search.'%')
                ->where('active', 1)
                ->latest()
                ->get();
        } else {
            $posts = Post::where('title', 'LIKE', '%'.$search.'%')
                ->where('tags', $tags)
                ->where('active', 1)
                ->latest()
                ->get();
        }

        // Return view with all found posts
        return view('home', [
            'posts' => $posts
        ]);
    }
}

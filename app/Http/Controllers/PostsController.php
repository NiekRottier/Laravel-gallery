<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use App\Models\Posts;

class PostsController extends Controller
{
    public function index()
    {
        return view('posts/index');
    }

    public function posts($id)
    {
        $post = Posts::findOrFail($id);

        return view('posts/post', [
            'post' => $post
        ]);
    }

    public function create()
    {
        return view('posts/create');
    }
}

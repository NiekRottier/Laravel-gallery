<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function showPost($id)
    {
        $post = Posts::findOrFail($id);

        return view('posts.post', [
            'post' => $post
        ]);
    }

    public function showCreate()
    {
        return view('posts.create');
    }
}

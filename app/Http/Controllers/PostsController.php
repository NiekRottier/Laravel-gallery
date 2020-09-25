<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        return view('posts/index');
    }

    public function posts($post)
    {
        return view('posts/post', [
            'post' => $post
        ]);
    }

    public function create()
    {
        return view('posts/create');
    }
}

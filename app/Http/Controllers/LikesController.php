<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{
    public function store(Request $request, $id)
    {
        $user = User::find(Auth::id());

        if ($user->num_of_posts < 1){
            return redirect('/posts/' . $id);
        }

        // Count likes with same post_id and user_id
        $likes = Like::where('post_id', $id)
            ->where('user_id', Auth::id())
            ->count();

        // Check if there aren't any likes with same post_id and user_id, create a new like
        if ($likes == 0){

            $like = new Like();

            $like->user_id = Auth::id();
            $like->post_id = $id;

            $like->save();
        }

        return redirect('/posts/' . $id);
    }
}

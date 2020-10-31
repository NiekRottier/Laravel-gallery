<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function login()
    {
        return view('users.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/');
        } else {
            return redirect('/passwordError');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }

    public function show($id)
    {
        $allUsers = User::all();
        $selectedUser = User::findOrFail($id);
        $posts = Post::whereUserId($id)->get();

        return view('users.user', [
            'allUsers' => $allUsers,
            'selectedUser' => $selectedUser,
            'posts' => $posts
        ]);
    }

    public function index()
    {
        $users = User::all()->sortByDesc('created_at');

        $this->authorize('seeAllUsers');

        return view('users.index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|min:3|max:255|unique:users',
            'password' => 'required|min:8|max:255',
            'repeatPassword' => 'required|min:8|max:255|same:password'
        ]);

        $user = new User();
        $hashedPassword = Hash::make($request->input('password'));

        $user->username = $request->input('username');
        $user->password = $hashedPassword;

        $user->save();

        return redirect('/users/' . $user->id);
    }

    public function edit($user_id)
    {
        $user = User::findOrFail($user_id);

        $this->authorize('editUser', $user);
        return view('users.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, $user_id)
    {
        $user = User::findOrFail($user_id);

        $request->validate([
            'username' => 'required|min:3|max:255|unique:users,username,' . $user->id
        ]);

        $user->username = $request->input('username');

        $user->save();
        return redirect('/users/' . $user->id);
    }

    public function destroy()
    {

    }
}

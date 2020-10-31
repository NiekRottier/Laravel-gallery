<?php

namespace App\Http\Controllers;

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

    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('users.user', [
            'user' => $user
        ]);
    }

    public function index()
    {
        $users = User::all()->sortByDesc('created_at');

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

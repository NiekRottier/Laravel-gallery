<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function login()
    {
        $users = Users::all()->sortByDesc('created_at');

        return view('users.login', [
            'users' => $users
        ]);
    }

    public function show($id)
    {
        $user = Users::findOrFail($id);

        return view('users.user', [
            'user' => $user
        ]);
    }

    public function index()
    {
        $users = Users::all()->sortByDesc('created_at');

        return view('users.index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store()
    {
        request()->validate([
            'username' => 'required|min:3|max:255|unique:users',
            'password' => 'required|min:8|max:255',
            'repeatPassword' => 'required|min:8|max:255|same:password'
        ]);

        $user = new Users();

        $user->username = request('username');
        $user->password = request('password');

        $user->save();

        return redirect('/users/' . $user->id);
    }

    public function edit($user_id)
    {
        $user = Users::findOrFail($user_id);

        return view('users.edit', [
            'user' => $user
        ]);
    }

    public function update($user_id)
    {
        $user = Users::findOrFail($user_id);

        request()->validate([
            'username' => 'required|min:3|max:255|unique:users,username,' . $user->id,
            'password' => 'required|min:8|max:255',
            'newPassword' => 'nullable|min:8|max:255',
            'repeatNewPassword' => 'nullable|min:8|max:255|same:newPassword',
        ]);

        $user->username = request('username');
        if(request('newPassword') !== null){
            $user->password = request('newPassword');
        }

        if (request('password') == $user->password){ $user->save(); } // NEEDS TO BE CHANGED TO A GOOD CHECK


        return redirect('/users/' . $user->id);
    }

    public function destroy()
    {

    }
}

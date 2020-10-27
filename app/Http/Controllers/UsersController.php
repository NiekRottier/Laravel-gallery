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
        $user = new Users();

        $user->username = request('username');
        $user->password = request('password');

        $user->save();

        return redirect('/');
    }

    public function edit()
    {

    }

    public function destroy()
    {

    }
}

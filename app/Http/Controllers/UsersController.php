<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function showCreate()
    {
        return view('account.create');
    }
}

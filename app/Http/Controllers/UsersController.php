<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
        return view('users.profile');
    }

    public function search()
    {
        $users = User::all();
        return view(
            'users.search',
            ['users' => $users]
        );
    }

    public function result(Request $request)
    {
        $users = User::where('username', 'like', '%' . $request->search . '%')->get();
        return view(
            'users.result',
            ['users' => $users]
        );
    }
}

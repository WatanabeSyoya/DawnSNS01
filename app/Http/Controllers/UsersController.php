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

    public function searchForm()
    {
        $users = User::all();
        return view(
            'users.searchForm',
            ['users' => $users]
        );
    }
    public function search(Request $request)
    {
        //dd($request->search);
        return view('users.search');
    }
}

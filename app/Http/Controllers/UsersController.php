<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

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
        $search_result =  $request->search;
        return view(
            'users.result',
            [
                'users' => $users,
                'search_result' => $search_result
            ]
        );
    }

    public function follow($id)
    {
        \DB::table('follows')->insert([
            'follower' => Auth::id(),
            'follow' => $id,
        ]);
        return redirect('/search');
    }

    public function unfollow($id)
    {
        \DB::table('follows')
            ->where('id', $id)
            ->delete();

        return redirect('/search');
    }
}

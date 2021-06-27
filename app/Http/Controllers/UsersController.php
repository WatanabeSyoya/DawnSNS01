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

    public function search(Request $request)
    {
        $search_result =  $request->search_result;
        $searched_user = User::where('username', 'like', '%' . $search_result . '%')->get();

        if (isset($search_result)) {
            $searched_user = User::where('username', 'like', '%' . $search_result . '%')->get();
            return view(
                'users.search',
                [
                    'searched_user' => $searched_user,
                    'search_result' => $search_result
                ]
            );
        } else {
            $users = User::all();
            return view(
                'users.search',
                ['users' => $users]
            );
        }
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

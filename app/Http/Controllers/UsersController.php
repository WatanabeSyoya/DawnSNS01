<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
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
        $id = Auth::user()->id;
        $follower = \DB::table('follows')->where('follower', $id)->get();
        $follower_user = [];

        foreach ($follower as $follower_id) {
            $follower_user[] = $follower_id->follow;
        }


        if (isset($search_result)) {
            $users = User::where('username', 'like', '%' . $search_result . '%')
                ->where('id', '!=', Auth::id())
                ->get();
            return view(
                'users.search',
                [
                    'users' => $users,
                    'search_result' => $search_result,
                    'follower_user' => $follower_user,
                ]
            );
        } else {
            $users = User::where('id', '!=', Auth::id())->get();
            return view(
                'users.search',
                [
                    'users' => $users,
                    'follower_user' => $follower_user,
                ]
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
            ->where('follow', $id)
            ->delete();
        return redirect('/search');
    }

    public function show($id)
    {
        $user = \DB::table('users')->where('id', $id)->first();
        $auth_id = Auth::user()->id;

        $follower = \DB::table('follows')->where('follower', $auth_id)->get();
        $follower_user = [];
        foreach ($follower as $follower_id) {
            $follower_user[] = $follower_id->follow;
        }

        $list = Post::where('user_id', $id)->get();
        $list->load('user');

        return view(
            'users.show',
            [
                'user' => $user,
                'follower_user' => $follower_user,
                'list' => $list,
            ]
        );
    }

    public function sshow($user_id)
    {


        $list = \DB::table('posts')
            ->where('user.id', $user_id)->get();


        $list = \DB::table('users')->where('id', $id)->first();




        return view('follows.otherProfile', compact('images', 'id', 'username', 'bio', 'follower', 'follower_user', 'following', 'following_user', 'list', 'other_list'));
    }
}

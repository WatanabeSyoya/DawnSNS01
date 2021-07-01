<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;

class FollowsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function followList()
    {

        $id = Auth::user()->id;

        $follow_list = \DB::table('users')
            ->where('follows.follower', $id)
            ->leftjoin('follows', 'follows.follow', 'users.id')
            ->get();

        $list = \DB::table('posts')
            ->where('follows.follower', $id)
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->leftjoin('follows', 'follows.follow', 'users.id')
            ->orderby('posts.created_at', 'desc')
            ->get();

        return view('follows.followList', compact('list', 'follow_list'));
    }




    public function followerList()
    {
        $id = Auth::user()->id;

        $follow_list = \DB::table('users')
            ->where('follows.follow', $id)
            ->leftjoin('follows', 'follows.follow', 'users.id')
            ->get();

        $list = \DB::table('posts')
            ->where('follows.follow', $id)
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->leftjoin('follows', 'follows.follower', 'users.id')
            ->orderby('posts.created_at', 'desc')
            ->get();

        return view('follows.followerList', compact('list', 'follow_list'));
    }
}

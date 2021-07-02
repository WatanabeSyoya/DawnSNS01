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
        $user = Auth::user();


        return view('users.profile', compact('user'));
    }


    public function update(Request $request)
    {
        $id = Auth::user()->id; //ログインしてる人のID
        $profile = \DB::table('users')->where('id', $id)->first();

        //入力されたものそれぞれを定義
        $edit_name = $request->input('username');
        $edit_mail = $request->input('mail');
        $edit_password = $request->input('newpassword');
        $edit_bio = $request->input('bio');
        $edit_images = $request->file('images');

        $update = $request->input();


        if (isset($edit_password) && isset($edit_images)) {
            $test = $request->file('images')->getClientOriginalName(); //画像の名前指定

            $request->file('images')->storeAs('images', $test, 'public_uploads');
            \DB::table('users')->where('id', $id)->update([
                'username' => $edit_name,
                'mail' => $edit_mail,
                'password' => $edit_password,
                'bio' => $edit_bio,
                'images' => $test,
            ]);
        } elseif (isset($edit_password) && !isset($edit_images)) {
            \DB::table('users')->where('id', $id)->update([
                'username' => $edit_name,
                'mail' => $edit_mail,
                'password' => $edit_password,
                'bio' => $edit_bio,
            ]);
        } elseif (!isset($edit_password) && isset($edit_images)) {
            $test = $request->file('images')->getClientOriginalName();

            $request->file('images')->storeAs('images', $test, 'public_uploads');
            \DB::table('users')->where('id', $id)->update([
                'username' => $edit_name,
                'mail' => $edit_mail,
                'bio' => $edit_bio,
                'images' => $test
            ]);
        } else {
            \DB::table('users')->where('id', $id)->update([
                'username' => $edit_name,
                'mail' => $edit_mail,
                'bio' => $edit_bio,
            ]);
        }


        return redirect('/');
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
}

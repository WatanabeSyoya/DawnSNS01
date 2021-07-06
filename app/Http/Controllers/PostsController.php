<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $list = Post::orderBy('id', 'desc')->get();
        //$list = \DB::table('posts')->orderBy('id', 'desc')->get();
        //dd($list);
        $list->load('user');
        return view('posts.index', [
            'list' => $list,
            'user' => $user,
        ]);
    }

    public function create(Request $request)
    {
        $post = $request->input('newPost');

        $user_id = Auth::id();

        \DB::table('posts')->insert([
            'posts' => $post,
            'user_id' => $user_id,
        ]);

        return redirect('/');
    }

    public function updateForm($id)
    {
        $post = \DB::table('posts')
            ->where('id', $id)
            ->first();
        return view('posts.updateForm', compact('post'));
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $up_post = $request->input('upPost');
        \DB::table('posts')
            ->where('id', $id)
            ->update(
                ['posts' => $up_post]
            );

        return redirect('/');
    }

    public function delete($id)
    {
        \DB::table('posts')
            ->where('id', $id)
            ->delete();

        return redirect('/');
    }
}

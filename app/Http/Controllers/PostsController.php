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
        $list = Post::all();
        $list->load('user');

        return view('posts.index', ['list' => $list]);
    }

    public function create(Request $request)
    {
        $post = $request->input('newPost');

        $user_id = Auth::id();

        \DB::table('posts')->insert([
            'post' => $post,
            'user_id' => $user_id,
        ]);

        return redirect('/index');
    }
}

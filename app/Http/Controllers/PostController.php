<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function posts(Post $post)
    {
        return view('posts.posts')->with(['posts' => $post->get()]);
    }

    public function result(Post $post)
    {
        return view('posts.result')->with(['posts' => $post]);
     //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
    }

    public function create($func, $start, $end)
    {
        return view('posts.create');
    }

    public function store(Post $post, PostRequest $request)
    {
        $user_id = Auth::id();
        $input = $request['post'];
        $input['user_id'] = $user_id;
        $post->fill($input)->save();
        return redirect('/posts/posts');
    }

    public function show(Post $post)
    {
        return view('posts.show')->with(['post' => $post]);
     //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
    }

    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/posts/posts');
    }
    
}

?>
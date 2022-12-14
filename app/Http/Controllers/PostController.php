<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Http\Requests\PostRequest;

use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::orderBy('created_at','desc')
        ->get();

        return view('index')
        ->with(['posts' => $posts]);
    }

    public function show(Post $post){
        return view('posts.show')
        ->with(['post' => $post]);
    }

    public function create(){
        return view('posts.create');
    }
    public function store(PostRequest $request){

        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return redirect()
        ->route('posts.index');
    }

    public function edit(Post $post){
        return view('posts.edit')
        ->with(['post' => $post]);
    }

    public function update(PostRequest $request,Post $post){

        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return redirect()
        ->route('posts.show', $post);
    }
    public function destroy(Post $post){

        $post->delete();

        return redirect()
        ->route('posts.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $s = $request->search;
        if($s)
            $posts = Post::select('posts.id as post_id', 'title', 'anons', 'img', 'name', 'posts.created_at as post_created_at' )
                    ->where('content', 'like', '%'.$s.'%')
                    ->join('users', 'posts.author_id', '=', 'users.id')
                    ->orderBy('post_created_at', 'desc')
                    ->paginate(4);
        else{
            $posts = Post::select('posts.id as post_id', 'title', 'anons', 'img', 'name', 'posts.created_at as post_created_at' )
                    ->join('users', 'posts.author_id', '=', 'users.id')
                    ->orderBy('post_created_at', 'desc')
                    ->paginate(6);
        }

        return view('post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post->author_id = rand(1,4);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->anons = Str::length($request->content) > 100 ? Str::substr($request->content, 0, 100) . '...' : $request->content;
        if ($request->file('img')) {
            $path = Storage::putFile('public', $request->file('img'));
            $url = Storage::url($path);
            $post->img = $url;
        }

        $post->save();
        return redirect()->route('posts.index')->with('success', 'Ваш пост успешно создан!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::select('title', 'content', 'img', 'name', 'posts.created_at as post_created_at' )
                    ->join('users', 'posts.author_id', '=', 'users.id')
                    ->find($id);
        return view('post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $s = $request->search;
        if($s)
            $posts = Post::select('posts.id as post_id', 'title', 'anons', 'img', 'name', 'posts.created_at as post_created_at')
                    ->where('content', 'like', '%'.$s.'%')
                    ->join('users', 'author_id', '=', 'users.id')
                    ->orderBy('post_created_at', 'desc')
                    ->paginate(4);
        else{
            $posts = Post::select('posts.id as post_id', 'title', 'anons', 'img', 'name', 'posts.created_at as post_created_at')
                    ->join('users', 'author_id', '=', 'users.id')
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
    public function store(PostRequest $request)
    {
        $post = new Post();
        $post->author_id = \Auth::user()->id;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->anons = Str::length($request->content) > 100 ? Str::substr($request->content, 0, 100) . '...' : $request->content;
        if ($request->file('img')) {
            // php artisan storage:link
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
        $post = Post::select('posts.id as post_id', 'title', 'content', 'img', 'name', 'author_id', 'posts.created_at as post_created_at' )
                    ->join('users', 'author_id', '=', 'users.id')
                    ->find($id);
                    // echo '<pre>';
                    // var_dump($post); exit;

        return view('post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        if ($post->author_id != \Auth::user()->id){
            return redirect()->route('posts.index')->withErrors('Вы не можете редактировать данный пост');
        }
        return view('post.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if ($post->author_id != \Auth::user()->id){
            return redirect()->route('posts.index')->withErrors('Вы не можете обновлять данный пост');
        }
        $post->title = $request->title;
        $post->content = $request->content;
        $post->anons = Str::length($request->content) > 100 ? Str::substr($request->content, 0, 100) . '...' : $request->content;
        if ($request->file('img')) {
            $path = Storage::putFile('public', $request->file('img'));
            $url = Storage::url($path);
            $post->img = $url;
        }

        $post->update();
        return redirect()->route('posts.show', ['id' => $id])->with('success', 'Ваш пост успешно отредактирован!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if ($post->author_id != \Auth::user()->id){
            return redirect()->route('posts.index')->withErrors('Вы не можете удалять данный пост');
        }
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Ваш пост успешно удален!');
    }
}

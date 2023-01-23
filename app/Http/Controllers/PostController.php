<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::all();
        $posts = Post::orderBy('created_at', 'DESC')->paginate(10);
        #dd($posts);
        return view('post.index')->with('posts', $posts);
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
        $request->validate(
            [
                'title' => 'required|min:3',
                'content' => 'required|min:5',
            ]
        );

        $post = new Post(
            [
                'title' => $request->title,
                'content' => $request->content,
            ]
        );
        $post->save();
        return $this->index()->with([
            'msg_success' => 'Post <strong>' . $post->title . '</strong> successfully created.',
        ]);
        // return redirect('/blog');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // $post = Post::all();
        // dd($post);
        return view('post.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('post.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate(
            [
                'title' => 'required|min:3',
                'content' => 'required|min:5',
            ]
        );

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);
        return $this->index()->with([
            'msg_success' => 'Post <strong>' . $request->title . '</strong> successfully changed.',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // $old_name = $post->title;
        $post->delete();
        return $this->index()->with([
            'msg_success' => 'Post successfully deleted.',
        ]);
    }
}

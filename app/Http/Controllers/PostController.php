<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

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
        $posts = Post::where('user_id', auth()->id())->orderBy('created_at', 'DESC')->paginate(10);
        // Carbon::
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
                'image' => 'mimes:jpeg,jpg,bmp,png,gif'
            ]
        );

        $post = new Post(
            [
                'title' => $request->title,
                'content' => $request->content,
                'user_id' => auth()->id(),
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
        $all_tags = Tag::all();
        $used_tags = $post->tags;
        $available_tags = $all_tags->diff($used_tags);

        $msg_success = Session::get('msg_success');
        return view('post.edit')->with(
            [
                'post' => $post,
                'available_tags' => $available_tags,
                'msg_success' => $msg_success,
            ]
        );
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
                'image' => 'mimes:jpeg,jpg,bmp,png,gif'
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

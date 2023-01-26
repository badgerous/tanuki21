<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;

class postTagController extends Controller
{
    public function getFilteredPosts($tag_id)
    {
        // echo "filtern nach tag id";
        $tag = new Tag();
        $current_tag = $tag::findOrFail($tag_id);
        $filteredPosts = $current_tag->filteredPosts()->paginate(10);
        return view('post.filteredByTag')->with(
            [
                'posts' => $filteredPosts,
                'tag' => $current_tag,
            ]
        );
    }

    public function attachTag($post_id, $tag_id)
    {
        $post = Post::find($post_id);
        $post->tags()->attach($tag_id);
        return back()->with('msg_success', 'Tag added');
    }

    public function detachTag($post_id, $tag_id)
    {
        $post = Post::find($post_id);
        $post->tags()->detach($tag_id);
        return back()->with('msg_success', 'Tag removed');
    }
}

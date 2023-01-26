<?php

namespace App\Http\Controllers;

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
}

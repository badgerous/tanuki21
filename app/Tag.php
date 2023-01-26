<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name', 'style'];

    public function posts()
    {
        return $this->belongsToMany('App\Post');
    }

    public function filteredPosts()
    {
        return $this->belongsToMany('App\Post')
            ->wherePivot('tag_id', $this->id)
            ->orderBy('updated_at', 'DESC');
    }
}

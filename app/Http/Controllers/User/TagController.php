<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function index()
    {
        $tags = Tag::latest()->paginate(5);
        return view('user.tag.index', ['tags'=>$tags]);
    }

    public function tag_posts($tagId)
    {
        $tag = Tag::find($tagId);
        $posts = $tag->post()->paginate(5);
        return view('user.tag.tagPosts', ['posts'=>$posts , 'tag'=>$tag]);
    }

}

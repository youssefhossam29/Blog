<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;



class PostController extends Controller
{

    public function tag_posts($tagId)
    {
        $tag = Tag::find($tagId);
        $posts = $tag->post()->withTrashed()->paginate(5);     // $posts = tag->posts()->get()
        return view('admin.post.tagPosts', ['posts'=>$posts , 'tag'=>$tag]);
    }

    public function index()
    {
        $all_post = Post::latest()->paginate(5);
        return view('admin.post.index', ['all_post'=>$all_post]);
    }

    public function trash()
    {
        $trashedpost = Post::onlyTrashed()->paginate(5);
        return view('admin.post.trash', ['trashedpost'=>$trashedpost]);
    }


    public function userTrash($userId)
    {
        $trashedpost = Post::onlyTrashed()->where('user_id' , $userId)->paginate(5);
        return view('admin.post.trash', ['trashedpost'=>$trashedpost]);
    }

    public function show($slug)
    {
        $post = Post::withTrashed()->where('slug',$slug)->first();
        return view('admin.post.show', ['post'=>$post]);
    }


    public function delete($id)
    {
        $post = Post::where('id' , $id)->first()->forceDelete();
        Alert::success('Success Title', 'post deleted Successfully');
        return redirect()->route('admin.post.index');

    }


}

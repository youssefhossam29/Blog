<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\profile;
use App\Models\Post;
use App\Models\User;

class UserController extends Controller
{
    public function show($userId)
    {
        $profile = Profile::where('user_id' , $userId)->first();
        $posts = Post::withTrashed()->where('user_id' , $userId)->paginate(6);
        return view('admin.user.show')->with('profile',$profile)->with('posts',$posts);
    }


    public function index()
    {
        $users = User::where('is_admin' , '0')->latest()->paginate(10);
        return view('admin.user.index', ['users'=>$users]);
    }


}

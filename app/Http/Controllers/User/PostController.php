<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;

use App\Models\Post;
use App\Models\Tag;

use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdaePostRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;



class PostController extends Controller
{

    public function index()
    {
        $all_post = Post::latest()->paginate(6);
        return view('user.post.index', ['all_post'=>$all_post]);
    }

    public function create()
    {
        $tags = Tag::all();
        return view('user.post.create', ['tags'=>$tags]);
    }


    public function store(StorePostRequest $request)
    {
        $this->createPost($request);
        Alert::success('Success Title', 'post added Successfully');
        return redirect()->route('user.post.index');
    }


    public function createPost($request)
    {
        $newPhoto = $this->upload($request->photo , 'uploads/posts' );
        $post = Post::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'content' => $request->content,
            'photo' => 'uploads/posts/'.$newPhoto,
            'slug' =>   str_slug($request->title . request()->server('REQUEST_TIME')),
        ]);
        $post->tag()->attach($request->tags);

        return $post;
    }


    public function show($slug)
    {
        $post = Post::where('slug',$slug)->first();
        return view('user.post.show', ['post'=>$post]);
    }


    public function edit($id)
    {
        $post = Post::find($id);
        $tags = Tag::all();

        if( $post->user_id == Auth::id()){
            return view('user.post.edit', ['post'=>$post] , ['tags'=>$tags]);
        }
        else{
            abort(401, 'Unauthorized');
        }
    }

    public function update(UpdaePostRequest $request, $post_id)
    {
        $post = Post::find($post_id);
        $this->updatePost($post , $request);
        Alert::success('Success Title', 'Post Updated Successfully');
        return redirect()->back();
    }

    public function updatePost($post , $request)
    {
        $post->title = $request->title;
        $post->content = $request->content;
        if ($request->photo != null) {
            $newPhoto = $this->upload($request->photo , 'uploads/posts' );
            $post->photo = 'uploads/posts/'. $newPhoto ;
        }
        $post->tag()->sync($request->tags);
        $post->save();
        return $post;
    }


    public function softdelete($id)
    {
        $post = Post::find($id);
        if( $post->user_id == Auth::id()){
            $post->delete();
            Alert::success('Success Title', 'post deleted Successfully');
            return redirect()->route('user.post.index');
        }
        else{
            abort(401, 'Unauthorized');
        }
    }


    public function trash_index()
    {
        $trashedpost = Post::onlyTrashed()->where( 'user_id' , Auth::id() )->paginate(3);
        return view('user.post.trash', ['trashedpost'=>$trashedpost]);
    }


    public function restore($id)
    {
        $product = Post::onlyTrashed()->where('id' , $id)->first()->restore();
        Alert::success('Success Title', 'post restored Successfully');
        return redirect()->route('user.post.index');
    }

    public function delete_trash($id)
    {
        $post = Post::onlyTrashed()->where('id' , $id)->first()->forceDelete();
        Alert::success('Success Title', 'post deleted Successfully');
        return redirect()->route('user.trashed.posts');
    }


    public function upload($file , $path)
    {
        $newFile = time().$file->getClientOriginalName();
        $file->move($path ,$newFile);
        return $newFile ;
    }


}

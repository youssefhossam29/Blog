<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\TagRequest;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class TagController extends Controller
{

    public function index()
    {
        $all_tag = Tag::latest()->paginate(5);
        return view('admin.tag.index', ['all_tag'=>$all_tag]);
    }


    public function create()
    {
        return view('admin.tag.create');
    }


    public function store(TagRequest $request)
    {
        $validator = Validator::make($request->all(), ['tag'=>'required']);
        $tag = Tag::create(['tag' => $request->tag]);
        Alert::success('Success Title', 'tag created Successfully');
        return redirect()->route('admin.tag.index');
    }


    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('admin.tag.edit', ['tag'=>$tag]);
    }


    public function update(TagRequest $request , $tag_id)
    {
        $tag = Tag::find($tag_id);
        $tag->tag = $request->tag;
        $tag->save();
        Alert::success('Success Title', 'tag updated Successfully');
        return redirect()->route('admin.tag.index');
    }


    public function destroy($id)
    {
        $tag = Tag::find($id)->destroy($id);
        Alert::success('Success Title', 'tag deleted Successfully');
        return redirect()->route('admin.tag.index');
    }



}

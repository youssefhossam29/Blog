<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Post;
use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Requests\CreateAdminRequest;
use App\Http\Requests\UpdateAdminRequest;

use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    public function index()
    {
        $admins = User::where('is_admin' , '1')->paginate(5);
        return view('admin.account.index', ['admins'=>$admins]);
    }


    public function create()
    {
        return view('admin.account.create');
    }


    public function register(CreateAdminRequest $request)
    {
        $admin = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>bcrypt($request->name),
            'is_Admin' => '1',
        ]);

        Alert::success('Success Title', 'Admin created Successfully');
        return redirect()->route('admin.post.index');
    }



    public function edit()
    {
        $user = Auth::user();
        return view('admin.account.edit')->with('user',$user);
    }


    public function update(UpdateAdminRequest $request)
    {
        $user = Auth::user();
        $user->name = $request->name ;

        if ($request->password != null) {
            $user->password = bcrypt($request->password);
        }
        if ($request->email != null) {
            $user->email = $request->email ;
        }
        $user->save();

        Alert::success('Success Title', 'account Updated Successfully');
        return redirect()->back();
    }

}

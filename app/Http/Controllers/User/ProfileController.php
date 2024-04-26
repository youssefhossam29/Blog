<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;

use App\Models\profile;
use App\Models\Post;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{



    public function showProfile($userId)
    {
        $posts = Post::where('user_id' , $userId)->paginate(5);
        $profile = Profile::where('user_id' , $userId)->first();
        return view('user.profile.showProfile')->with('posts',$posts)->with('profile',$profile);
    }


    public function showMyProfile()
    {
        $userId = Auth::id();
        $profile = Profile::where('user_id' , $userId)->first();
        $posts = Post::where('user_id' , $userId)->paginate(5);
        return view('user.profile.showProfile')->with('profile',$profile)->with('posts',$posts);
    }


    public static function create($userId)
    {
        $profile = Profile::create([
            'city' => 'cairo',
            'user_id'	 => $userId,
            'gender' => 'Male',
            'bio'	 => 'Hello world',
            'facebook' => 'https://www.facebook.com',
            'photo' => 'uploads/users/user.jpg',

       ]);
       return $profile;
    }


    public function edit()
    {
        $user = Auth::user();
        return view('user.profile.editProfile')->with('user',$user);
    }


    public function update(ProfileRequest $request)
    {
        $user = Auth::user();
        $this->updateUser($user , $request);
        $this->updateProfile($user->profile , $request);
        Alert::success('Success Title', 'Profile Updated Successfully');
        return redirect()->back();
    }


    public function upload($file , $path)
    {
        $newFile = time().$file->getClientOriginalName();
        $file->move( $path ,$newFile);
        return $newFile ;
    }


    public function updateUser($user , $request)
    {
        $user->name = $request->name ;
        if ($request->password != null) {
            $user->password = bcrypt($request->password);
        }
        $user->save();
        return $user;
    }

    public function updateProfile($profile , $request)
    {
        $profile->update($request->all());
        if ($request->photo != null) {
            $newPhoto = $this->upload($request->photo , 'uploads/users' );
            $profile->photo = 'uploads/users/'. $newPhoto ;
        }
        $profile->save();
        return $profile;
    }


}

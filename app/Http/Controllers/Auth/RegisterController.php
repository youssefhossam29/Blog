<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Http\Controllers\User\ProfileController as ProfileController;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\profile;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;


    protected $redirectTo = RouteServiceProvider::HOME;
    // the page that user will redirected to after regestration
    // we change it from  RouteServiceProvider


    // to protect routes , user can access routes after reg
    public function __construct()
    {
        $this->middleware('guest');
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' =>bcrypt($data['password']),
           // 'password' => Hash::make($data['password']),
        ]);

        $profile = app()->make(ProfileController::class);
        $profile = $profile->create($user->id);

        if($profile == null)
            return  redirect()->back();

        return  $user;

    }
}

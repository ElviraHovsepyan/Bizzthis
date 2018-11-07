<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback(){
        $user = Socialite::driver('facebook')->user();
        $name = $user->getName();
        $email = $user->getEmail();
        $facebook_id = $user->getId();
        $check = User::where('facebook_id',$facebook_id)->first();
        if($check){
            $user_id = $check->id;
        } else {
            $checkEmail = User::where('email',$email)->first();
            if($checkEmail) return view('user.login')->withError('Use another account');
            $user = new User();
            $user->name = $name;
            $user->email = $email;
            $user->facebook_id = $facebook_id;
            $user->role_id = 3;
            $user->save();
            $user_id = $user->id;
        }
        Auth::loginUsingId($user_id);
        return redirect()->route('mainView');
    }
}

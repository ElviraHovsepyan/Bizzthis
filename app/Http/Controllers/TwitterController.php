<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class TwitterController extends Controller
{
    public function redirectToTwitter(){

        return Socialite::driver('twitter')->redirect();
    }

    public function handleTwitterCallback(){
        $user = Socialite::driver('twitter')->user();
        $name = $user->getName();
        $email = $user->getEmail();
        $twitter_id = $user->getId();
        $check = User::where('twitter_id',$twitter_id)->first();
        if($check){
            $user_id = $check->id;
        } else {
            $checkEmail = User::where('email',$email)->first();
            if($checkEmail) return view('user.login')->withError('Use another account');
            $user = new User();
            $user->name = $name;
            $user->email = $email;
            $user->twitter_id = $twitter_id;
            $user->role_id = 3;
            $user->save();
            $user_id = $user->id;
        }
        Auth::loginUsingId($user_id);
        return redirect()->route('mainView');
    }
}

<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle(){

        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(){
        $user = Socialite::driver('google')->user();
        $name = $user->getName();
        $email = $user->getEmail();
        $google_id = $user->getId();
        $check = User::where('google_id',$google_id)->first();
        if($check){
            $user_id = $check->id;
        } else {
            $checkEmail = User::where('email',$email)->first();
            if($checkEmail) return 'Use another account';
            $user = new User();
            $user->name = $name;
            $user->email = $email;
            $user->google_id = $google_id;
            $user->role_id = 3;
            $user->save();
            $user_id = $user->id;
        }
        Auth::loginUsingId($user_id);
    }
}

<?php

namespace App\Http\Controllers;

use App\Instagram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class InstagramController extends Controller
{
    public function redirectToInstagram()
    {
        return Socialite::driver('instagram')->redirect();
    }

    public function handleInstagramCallback(){
        $user_id = Auth::user()->id;
        $user = Socialite::driver('instagram')->user();
        $token = $user->accessTokenResponseBody['access_token'];
        $insta_id = $user->getId();
        $check = Instagram::where('user_id',$user_id)->first();
        if(!$check){
            $insta = new Instagram();
            $insta->user_id = $user_id;
            $insta->token = $token;
            $insta->insta_id = $insta_id;
            $insta->save();
        }
        return redirect()->route('mainView');
    }
}

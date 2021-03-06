<?php

namespace App\Http\Controllers;

use App\Company;
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
            if($checkEmail) return view('user.login')->withError('Use another account');
            $user = new User();
            $user->name = $name;
            $user->email = $email;
            $user->google_id = $google_id;
            $user->role_id = 3;
            $user->save();
            $user_id = $user->id;
        }
        Auth::loginUsingId($user_id);
        return redirect()->route('mainView');
    }

    public static function getGeocode($param){
        $response = \Geocoder::geocode('json', $param);
        return json_decode($response, true);
    }

    public static function setGeocode($company)
    {
        $street = $company->address;
        $country = 'Sweden';
        $address = $street . ' ' . $country;
        $param = ["address" => $address];
        $geocode = self::getGeocode($param);
        if($geocode['status'] !== "ZERO_RESULTS"){
            $geocode = $geocode['results'][0]['geometry']['location'];
            $company->lat = $geocode['lat'];
            $company->lng = $geocode['lng'];
            $company->save();
            return $company;
        }
        else return false;
    }
}

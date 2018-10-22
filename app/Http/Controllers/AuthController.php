<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{

//    public function loginView(){
//
//    }

    public function login(Request $request){
        $data = $request->all();
        $login = User::login($data);
        if($login != 'success'){
           return 'Invalid Email or password';
        }
        else return 'success';
    }

//    public function registerView(){
//
//    }

    public function register(Request $request){
        $data = $request->all();
        $validate = User::validate($data);
        if($validate != true) return $validate;
        $register = User::register($data);
    }


}

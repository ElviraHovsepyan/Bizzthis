<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function loginView(){
        return view('user.login');
    }

    public function login(Request $request){
        $data = $request->all();
        $login = User::login($data);
        if($login != 'success'){
           return 'Invalid Email or password';
        } else {
            if($request->role == 'user') {
                return redirect()->route('mainView');
            }
            else return 'success';
        }
    }

    public function registerView(){
        return view('user.register');
    }

    public function register(Request $request){
        $data = $request->all();
        $validate = User::validate($data);
        if($validate !== true) return $validate;
        else {
            User::register($data);
            if($request->role == 'user') return redirect()->route('mainView');
            else return 'success';
        }
    }

    public function clientLoginView(){
        return view('client.login');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('mainView');
    }

    public function testMail(){
        Mail::send('welcome', ['asd'], function($message) {
            $message->to('elhovsepyan1@gmail.com', 'Tutorials Point')->subject
            ('Laravel HTML Testing Mail');
            $message->from('boyakhchyanaregtester@gmail.com','test');
        });
    }
}

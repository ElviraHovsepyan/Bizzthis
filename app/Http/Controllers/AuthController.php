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
            if($request->role == 'user') {
                return view('user.login')->withError('Invalid Email or password');
            }
            else return view('client.login')->withError('Invalid Email or password');
        } else {
            if($request->role == 'user') {
                return redirect()->route('mainView');
            }
            else return redirect()->route('dashboardView');
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
            else return redirect()->route('dashboardView');
        }
    }

    public function clientLoginView(){
        return view('client.login');
    }

    public function logout($role){
        Auth::logout();
        if($role == 'client')return redirect()->route('clientLoginView');
        else return redirect()->route('mainView');
    }

    public function editView(){
        return view('edit_profile');
    }

    public function editProfile(Request $request){
        $data = $request->all();
        $image = $request->has('image') ? $request->file('image') : false;
        if(is_null($data['old_password'])) $data['old_password'] = '';
        if(is_null($data['password'])) $data['password'] = '';
        $edit = User::editProfile($data,$image);
        if($edit != 'success') return view('edit_profile')->withWarning($edit);
        else return redirect()->route('editView');
    }

    public function testMail(){
        Mail::send('welcome', ['asd'], function($message) {
            $message->to('elhovsepyan1@gmail.com', 'Tutorials Point')->subject
            ('Laravel HTML Testing Mail');
            $message->from('boyakhchyanaregtester@gmail.com','test');
        });
    }
}

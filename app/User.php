<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static $rulesUser = [
        'name'=>'required|string|min:3|max:100',
        'email'=>'required|email|unique:users,email',
        'password'=>'required|string|min:6',
    ];

    public static $rulesClient = [
        'name'=>'required|string|min:3|max:100',
        'email'=>'required|email|unique:users,email',
        'password'=>'required|string|min:6|confirmed',
        'company_name'=>'required|string|min:3|max:100',
        'company_number'=>'required|numeric',
        'address'=>'required|string',
        'post_code'=>'string',
        'last_name'=>'string',
        'telephone'=>'required'
    ];

    public static function validate($data){
        if($data['role']=='user') $rules = self::$rulesUser;
        else $rules = self::$rulesClient;
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return $errors;
        }
        return true;
    }

    public static function register($data){
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();
        if($data['role']!='user'){
            $user_detail_id = User_Detail::addUserDetails($data);
            $user->user_detail_id = $user_detail_id;
            $user->role_id = 2;

        } else {
            $user->role_id = 3;
        }
        $user->save();
    }

    public static function login($data){
        $email = $data['email'];
        $password = $data['password'];

        $check = User::where('email',$email)->first();
        if($check){
            $hashedPassword = $check->password;
            if(Hash::check($password,$hashedPassword)){
                $user_id = $check->id;
                Auth::loginUsingId($user_id);
                return 'success';
            } else return 'login fails';
        } else return 'login fails';
    }
}

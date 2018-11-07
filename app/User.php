<?php

namespace App;

use Carbon\Carbon;
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
        'password'=>'required|string|min:6',
        'repeat'=>'required|same:password',
        'company_name'=>'required|string|min:3|max:100',
        'company_number'=>'required|numeric',
        'address'=>'required|string',
        'post_code'=>'string',
        'last_name'=>'string',
        'telephone'=>'required'
    ];

    public static $editRules = [
        'name'=>'string|min:3|max:100',
        'old_password'=>'string|min:6',
        'password'=>'string|min:6|confirmed',
        'pic'=>'image|max:3000'
    ];

    public function subcategories(){
        return $this->belongsToMany('App\Subcategory','user__subcategories','user_id','subcategory_id');
    }

    public function companies(){
        return $this->belongsTo('App\Company','company_id');
    }

    public function reviews(){
        return $this->hasMany('App\Review','user_id');
    }

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
        $date = Carbon::now()->format('Y-m-d h:i A');
        $user->last_login = $date;
        $user->this_login = $date;
        $user->save();
        if($data['role']!='user'){
            $company_id = Company::addUserDetails($data);
            $user->company_id = $company_id;
            $user->role_id = 2;

        } else {
            $user->role_id = 3;
        }
        $user->save();
        $user_id = $user->id;
        Auth::loginUsingId($user_id);
    }

    public static function login($data){
        $email = $data['email'];
        $password = $data['password'];
        if($data['role'] == 'user') $role_id = 3;
        else if($data['role'] == 'client') $role_id = 2;
        $check = User::where([['email',$email],['role_id',$role_id]])->first();
        if($check){
            $hashedPassword = $check->password;
            if(Hash::check($password,$hashedPassword)){
                $user_id = $check->id;
                Auth::loginUsingId($user_id);
                $check->last_login = $check->this_login;
                $check->this_login = Carbon::now()->format('Y-m-d h:i A');
                $check->save();
                return 'success';
            } else return 'login fails';
        } else return 'login fails';
    }

    public static function editProfile($data,$image){
        $rules = self::$editRules;
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return $errors;
        }
        $user_id = Auth::user()->id;
        $user = User::find($user_id);

        if($data['name']) $user->name = $data['name'];
        if(!empty($data['old_password'])){
            $check = User::find($user_id);
            $hashedPassword = $check->password;
            if(!empty($data['password']))$password = $data['password'];
            else return 'Invalid Password';
            if(!Hash::check($data['old_password'],$hashedPassword)){
                return 'Invalid Password';
            }
            $user->password = Hash::make($password);
        }
        if($image){
            $name =  $image->getClientOriginalName();
            $name = explode('.',$name);
            $ext = end($name);
            $name = $name[0].Carbon::now()->timestamp;
            $image->move('images/user_images/', $name.'.'.$ext);
            $pic = $name.'.'.$ext;
            $user->image = $pic;
        }
        $user->save();
        return 'success';
    }
}

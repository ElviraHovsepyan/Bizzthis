<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Company extends Model
{
    public static $rulesClient = [
        'name'=>'string|min:3|max:100',
        'company_name'=>'string|min:3|max:100',
        'company_number'=>'numeric',
        'address'=>'string',
        'post_code'=>'string',
        'last_name'=>'string',
        'password'=>'string|min:6|confirmed',

    ];

    public function users(){
        return $this->hasOne('App\User','company_id');
    }

    public static function addUserDetails($data){
        $user_details = new Company();
        $user_details->company_name = $data['company_name'];
        $user_details->company_number = $data['company_number'];
        $user_details->address = $data['address'];
        $user_details->last_name = $data['last_name'];
        $user_details->post_code = $data['post_code'];
        $user_details->telephone = $data['telephone'];
        $user_details->save();
        return $user_details->id;
    }

    public static function editCompany($data){
        $rules = self::$rulesClient;
        if($data['email'] !== Auth::user()->email){
           $rules['email'] = 'email|unique:users,email';
        }
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return $errors;
        }
        $user_id = Auth::user()->id;
        $company = Company::with('users')->whereHas('users',function ($query) use ($user_id){
            $query->where('users.id',$user_id);
        })->first();
        if(!empty($data['company_name'])) $company->company_name = $data['company_name'];
        if(!empty($data['company_number'])) $company->company_number = $data['company_number'];
        if(!empty($data['address'])) $company->address = $data['address'];
        if(!empty($data['last_name'])) $company->last_name = $data['last_name'];
        if(!empty($data['post_code'])) $company->post_code = $data['post_code'];
        if(!empty($data['telephone'])) $company->telephone = $data['telephone'];
        if(!empty($data['vat'])) $company->vat = $data['vat'];
        if(!empty($data['cart'])) $company->cart = $data['cart'];

        if(!empty($data['name'])) $company->users['name'] = $data['name'];
        if(!empty($data['email'])) $company->users['email'] = $data['telephone'];
        if(!empty($data['password'])) $company->users['password'] = Hash::make($data['cart']);

        $company->push();
        return 'success';
    }

}

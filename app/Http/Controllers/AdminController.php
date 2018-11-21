<?php

namespace App\Http\Controllers;

use App\Company;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function adminView(){
        $clients = Company::with('users')->get();
        return view('admin.admin_main',['clients'=>$clients]);
    }

    public function client_edit(Request $request){
        $company_id = $request->id;
        $company = Company::find($company_id);
        return view('admin.admin_settings',['company'=>$company]);
    }

    public function edit(Request $request){
        $company_id = $request->company_id;
        $company = Company::with('users')->where('id',$company_id)->first();
        $image = $request->has('image') ? $request->file('image') : false;
        if($image){
           unlink('images/company_images/'.$company->logo);
           $name =  $image->getClientOriginalName();
           $name = explode('.',$name);
           $ext = end($name);
           $name = $name[0].Carbon::now()->timestamp;
           $image->move('images/company_images/', $name.'.'.$ext);
           $pic = $name.'.'.$ext;
           $company->logo = $pic;
        }
        if(!empty($request->company_name)) $company->company_name = $request->company_name;
        if(!empty($request->company_number)) $company->company_number = $request->company_number;
        if(!empty($request->post_code)) $company->post_code = $request->post_code;
        if(!empty($request->cart)) $company->cart = $request->cart;
        if(!empty($request->slogan)) $company->slogan = $request->slogan;
        if(!empty($request->website)) $company->website = $request->website;
        if(!empty($request->last_name)) $company->last_name = $request->last_name;
        if(!empty($request->telephone)) $company->telephone = $request->telephone;
        if(!empty($request->vat)) $company->vat = $request->vat;
        if(!empty($request->address)) $company->address = $request->address;
        if(!empty($request->name)) $company['users']->name = $request->name;
        if(!empty($request->email)) $company['users']->email = $request->email;
        $company->push();
        return back();
    }

    public function add_client_view(){
        return view('admin.admin_add_client');
    }

    public function add_client(Request $request){
        $company = new Company();
        $image = $request->has('image') ? $request->file('image') : false;
        if($image){
            $name =  $image->getClientOriginalName();
            $name = explode('.',$name);
            $ext = end($name);
            $name = $name[0].Carbon::now()->timestamp;
            $image->move('images/company_images/', $name.'.'.$ext);
            $pic = $name.'.'.$ext;
            $company->logo = $pic;
        }
        $company->company_name = $request->company_name;
        $company->company_number = $request->company_number;
        $company->telephone = $request->telephone;
        $company->address = $request->address;
        if(!empty($request->post_code)) $company->post_code = $request->post_code;
        if(!empty($request->cart)) $company->cart = $request->cart;
        if(!empty($request->slogan)) $company->slogan = $request->slogan;
        if(!empty($request->website)) $company->website = $request->website;
        if(!empty($request->last_name)) $company->last_name = $request->last_name;
        if(!empty($request->vat)) $company->vat = $request->vat;
        if(!strpos($request->company_name,' ')){
            $slug = '_'.$request->company_name;
        } else {
            $slug = str_replace(' ', '_',$request->company_name);
        }
        $company->slug = $slug;
        $company->save();
        $profile_pic = $request->has('profile_pic') ? $request->file('profile_pic') : false;
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = 2;
        $user->company_id = $company->id;
        if($profile_pic){
            $name =  $profile_pic->getClientOriginalName();
            $name = explode('.',$name);
            $ext = end($name);
            $name = $name[0].Carbon::now()->timestamp;
            $profile_pic->move('images/user_images/', $name.'.'.$ext);
            $pic = $name.'.'.$ext;
            $user->image = $pic;
        }
        $date = Carbon::now()->format('Y-m-d h:i A');
        $user->last_login = $date;
        $user->this_login = $date;
        $user->save();
        return redirect()->route('adminView');
    }
}

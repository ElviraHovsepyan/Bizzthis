<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function dashboardView(){
        return view('client.dashboard');
    }

    public function prices(){
        return view('client.dashboard_prices');
    }

    public function settings(){
        $user_id = Auth::user()->id;
        $company = Company::with('users')->whereHas('users',function ($query) use ($user_id){
          $query->where('users.id',$user_id);
        })->first();
        return view('client.dashboard_settings')->withCompany($company);
    }

    public function editCompany(Request $request){
        $data = $request->all();
        if(is_null($data['password'])) $data['password'] = '';
        if(is_null($data['password_confirmation'])) $data['password_confirmation'] = '';
        $edit = Company::editCompany($data);
        if($edit != 'success'){
            return redirect()->route('dashboardSettings', $edit);
        }
    }
}

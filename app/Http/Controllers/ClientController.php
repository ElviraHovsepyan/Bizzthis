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

    public function editCompany(Request $request){
        $data = $request->all();
        if(is_null($data['password'])) $data['password'] = '';
        if(is_null($data['password_confirmation'])) $data['password_confirmation'] = '';
        $edit = Company::editCompany($data);
        return $this->settings($edit === 'success' ? false : $edit);
    }

    public function settings($warnings = false){
        $user_id = Auth::user()->id;
        $company = Company::with('users')->whereHas('users',function ($query) use ($user_id){
            $query->where('users.id',$user_id);
        })->first();
        if($warnings){
            return view('client.dashboard_settings')->withCompany($company)->withWarning($warnings);
        } else {
            return view('client.dashboard_settings')->withCompany($company);
        }
    }

    public function invoices(){
        return view('client.dashboard_invoices');
    }

    public function insights(){
        return view('client.dashboard_insights');
    }

    public function profile(){
        return view('client.dashboard_profile');
    }
}

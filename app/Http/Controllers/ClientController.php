<?php

namespace App\Http\Controllers;

use App\Category;
use App\Company;
use App\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function dashboardView(){
        return view('client.dashboard');
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

    public function prices(){
        $user_id = Auth::user()->id;
        $prices = Price::with('categories')->where('user_id',$user_id)->get();
        return view('client.dashboard_prices')->withPrices($prices);
    }

    public function price_dim(Request $request){
        $dim = $request->dim;
        $id = $request->id;
        if($dim == 1){
            $categories = Category::with('children.children')->where('dimension_level',$dim)->get();
        } else {
            $categories = Category::with('children.children')->where('parent',$id)->get();
        }
        return json_encode($categories);
    }

    public function add_price(Request $request){
        $id = $request->id;
        $price = $request->price;
        if(!is_numeric($price)){
            return 'false';
        } else {
            $obj = new Price();
            if(!empty($request->user_id)) $obj->user_id = $request->user_id;
            else $obj->user_id = Auth::user()->id;
            $obj->category_id = $id;
            $obj->price = $price;
            $obj->save();
            return 'success';
        }
    }
}

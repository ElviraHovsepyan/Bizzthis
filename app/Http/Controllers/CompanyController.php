<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Helpers\InstagramApi;
use App\Instagram;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function companyDetails(){
        $company = Company::with('users')->first();
        $company_id = $company->id;
        $rating = $this->getCompanyRating($company_id);
        $reviews = Review::with('users')->where('company_id',$company_id)->orderBy('id', 'desc')->get();
        $user_id = Auth::user()->id;
        $insta = Instagram::where('user_id',$user_id)->first();
        if($insta){
            $token = $insta->token;
            $instagram_client = new InstagramApi($token);
            $user = $instagram_client->getUser();
            $posts = $instagram_client->getPosts();
        } else {
            $posts = false;
        }
        return view('company_page',['company'=>$company,'reviews'=>$reviews,'rating'=>$rating,'page'=>'company','posts'=>$posts]);
    }

    public function addComments(Request $request){
        $text = trim($request->text);
        if(empty($text) || strlen($text) < 2){
            return redirect()->route('companyDetails');
        }
        $data = $request->all();
        Review::saveComment($data);
        return redirect()->route('companyDetails');
    }

    public function getCompanyRating($id){
        $rates = Review::where('company_id',$id)->get();
        $count = count($rates);
        if($count < 0){
            $realRate = 0;
            return $realRate;
        }
        $fullRate = 0;
        foreach($rates as $rate){
            $fullRate += $rate->company_rating;
        }
        $realRate = round($fullRate/$count,2);
        return $realRate;
    }

    public function getServiceRating($id){
        $rates = Review::where('company_id',$id)->get();
        $count = count($rates);
        if($count <= 0){
            $realRate = 0;
            return $realRate;
        }
        $fullRate = 0;
        foreach($rates as $rate){
            $fullRate += $rate->service_rating;
        }
        $realRate = round($fullRate/$count);
        return $realRate;
    }
}

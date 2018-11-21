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
    public function companyDetails($slug){
        $company = Company::with('users')->where('slug', $slug)->first();
        if($company){
            $company_id = $company->id;
            $reviews = Review::with('users')->where('company_id',$company_id)->orderBy('id', 'desc')->get();
            $user_id = $company['users']->id;
            $insta = Instagram::where('user_id',$user_id)->first();
            if($insta){
                $token = $insta->token;
                $instagram_client = new InstagramApi($token);
                $user = $instagram_client->getUser();
                $posts = $instagram_client->getPosts();
            } else {
                $posts = false;
            }
            return view('company_page',['company'=>$company,'reviews'=>$reviews,'page'=>'company','posts'=>$posts]);
        }
        else{
            return('Company not found');
        }
    }

    public function addComments(Request $request){
        $text = trim($request->text);
        if(empty($text) || strlen($text) < 2){
            return back();
        }
        $data = $request->all();
        Review::saveComment($data);
        return back();
    }

    public static function getCompanyRating($id){
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
        $company = Company::where('id',$id)->first();
        $company->rating = $realRate;
        $company->save();
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

    public static function getReviewsCount($id){
        $reviews = Review::where('company_id',$id)->get();
        $count = count($reviews);
        $company = Company::find($id);
        $company->rev_count = $count;
        $company->save();
    }
}

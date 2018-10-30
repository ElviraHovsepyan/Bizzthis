<?php

namespace App\Http\Controllers;

use App\Company;
use App\Review;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function companyDetails(){
        $company = Company::with('users')->first();
        $company_id = $company->id;
        $rating = $this->getCompanyRating($company_id);
        $reviews = Review::with('users')->where('company_id',$company_id)->orderBy('id', 'desc')->get();
        return view('company_page')->withCompany($company)->withReviews($reviews)->withRating($rating)->withPage('company');
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
        $fullRate = 0;
        foreach($rates as $rate){
            $fullRate += $rate->service_rating;
        }
        $realRate = round($fullRate/$count);
        return $realRate;
    }


}

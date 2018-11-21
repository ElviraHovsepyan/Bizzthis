<?php

namespace App;

use App\Http\Controllers\CompanyController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Review extends Model
{
    public function users(){
        return $this->belongsTo('App\User','user_id');
    }

    public static function saveComment($data){
        $user_id = Auth::user()->id;
        $review = new Review();
        $review->user_id = $user_id;
        $review->company_id = $data['company_id'];
        $review->text = $data['text'];
        if($data['company_rating']) $review->company_rating = $data['company_rating'];
        if($data['service_rating']) $review->service_rating = $data['service_rating'];
        $review->save();
        if($data['company_rating']){
            CompanyController::getCompanyRating($data['company_id']);
        }
        CompanyController::getReviewsCount($data['company_id']);
    }
}

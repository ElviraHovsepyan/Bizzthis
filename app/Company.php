<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function users(){
        return $this->belongsTo('App\User','company_id');
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
}

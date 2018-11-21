<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    public function categories(){
        return $this->belongsTo('App\Category','category_id');
    }

    public function users(){
        return $this->belongsTo('App\User','user_id');
    }
}

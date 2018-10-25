<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    public $timestamps = false;

    public function users(){
        return $this->belongsToMany('App\User','user__subcategories','subcategory_id','user_id');
    }

    public function categories(){
        return $this->belongsTo('App\Category','category_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;

    public function parent()
    {
        return $this->belongsTo('App\Category', 'parent','id');
    }

    public function children()
    {
        return $this->hasMany('App\Category', 'parent','id');
    }

    public function prices(){
        return $this->hasMany('App\Price','category_id');
    }

}

<?php

namespace App\Http\Controllers;

use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request){
        if(!empty($request->parent)){
            $parent = $request->parent;
            $p = Category::find($parent)->parent;
            $categories = Category::with('children.children')->where('parent',$p)->get();
            $dim = $categories[0]->dimension_level;
        } else if(!empty($request->id)){
            $id = $request->id;
            $categories = Category::with('children.children')->where('parent',$id)->get();
            $dim = $categories[0]->dimension_level;
        } else {
            $categories = Category::with('children')->where('dimension_level',1)->get();
            $dim = 1;
        }
        return view('main_page')->withCategories($categories)->withDimension($dim);
    }

    public function company(){
        return view('company');
    }
}

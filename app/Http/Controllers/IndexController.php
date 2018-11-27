<?php

namespace App\Http\Controllers;

use App\Category;
use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function search($id = false, $start = false, $end = false, $take, $offset){
        if(!$id) $q = Company::with('users.prices.categories');
        else $q = Company::with('users.prices.categories')->whereHas('users.prices.categories', function ($query) use ($id){
            $this->setIdQuery($query, $id);
        });
        $companies = $this->setQuery($q, $start, $end)->take($take)->offset($offset)->get();
        return $companies;
    }

    public function setIdQuery($query, $id){
        $q = $query->where('categories.id',$id);
        if(count($id) == 1){
          return $q;
        } else {
            for($i = 1; $i < count($id); $i++){
                $q = $q->orWhere('categories.id',$id[$i]);
            }
            return $q;
        }
    }

    public function setQuery($query, $start = false, $end = false){
       if(!$start) return $query;
       else return $query->whereHas('users.prices',function ($query) use ($start, $end) {
                $this->setPriceQuery($query, $start, $end);
       });
    }

    public function setPriceQuery($query, $start, $end){
       if($start == 600) return $query->where('price','>',$start);
       else return $query->where('price','>',$start)->where('price','<',$end);
    }

    public function filter(Request $request){
        $take = $request->take;
        $offset = $request->offset;
        $filter = $request->arr;
        if(!empty($filter['id'])) $id = $filter['id'];
        else $id = false;
        if(!empty($filter['price']['start'])) $start = $filter['price']['start'];
        else $start = false;
        if(!empty($filter['price']['end'])) $end = $filter['price']['end'];
        else $end = false;
        $companies = $this->search($id, $start, $end, $take, $offset);
        if($companies && !empty($filter['loc'])){
            $start = $filter['loc']['start'];
            $end = $filter['loc']['end'];
            $coord = $filter['loc']['coord'];
            $companies = MapsController::getDistance($start, $end, $coord, $companies);
        } else if(!empty($filter['loc'])){
            $start = $filter['loc']['start'];
            $end = $filter['loc']['end'];
            $coord = $filter['loc']['coord'];
            $companies = MapsController::getDistance($start, $end, $coord);
        }
        $companies = $this->getDistanceDifference($request,$companies);
        return json_encode($companies);
    }

    public function getDistanceDifference($request,$companies){
        if(Auth::user()){
            $lat = Auth::user()->lat;
            $lng = Auth::user()->lng;
        } else {
            $lat = $request->coord['lat'];
            $lng = $request->coord['lng'];
        }
        foreach ($companies as $company){
            $latitudeTo = $company->lat;
            $longitudeTo = $company->lng;
            $distance = MapsController::distanse($lat,$lng,$latitudeTo,$longitudeTo);
            $company->distance = ceil($distance/1000);
        }
        if(!is_array($companies)) $companies = $companies->toArray();
        usort($companies, function($a, $b) use ($request)
        {
            if($request->sort == 'asc'){
                return $a['distance'] > $b['distance'];
            } else {
                return $a['distance'] < $b['distance'];
            }
        });
        return $companies;
    }
}




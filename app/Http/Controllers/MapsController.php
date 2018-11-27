<?php

namespace App\Http\Controllers;

use App\Company;
use App\User;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MapsController extends Controller
{
    public function show(Request $request){
        $companies = Company::all();
        $res['companies'] = $companies;
        if(Auth::user()){
            $user_id = Auth::user()->id;
            $user = User::find($user_id);
            $res['lat'] = $user->lat;
            $res['lng'] = $user->lng;
            $res['user'] = 'user';
        } else{
            $latlng = self::setGeocode($request);
            $res['lat'] = $latlng['lat'];
            $res['lng'] = $latlng['lng'];
            $res['user'] = 'guest';
        }
        return json_encode($res);
    }

    public static function setGeocode($req){
//        $ip = $req->ip();
//        $ip = '82.199.214.130';
        $ip = '5.189.207.191';
        $client = new \GuzzleHttp\Client();
        try{
            $request = $client->request('GET', 'http://www.geoplugin.net/json.gp?ip='.$ip);
        }
        catch (GuzzleException $guzzleException){
            dd("Sorry, url not working");
        }
        $response = $request->getBody()->getContents();
        $response = json_decode($response);
        $lat = $response->geoplugin_latitude;
        $lng = $response->geoplugin_longitude;
        return ['lat' => $lat, 'lng' => $lng];
    }

    public function setNewCords(Request $request){
        if(Auth::user()){
            $user_id = Auth::user()->id;
            $user = User::find($user_id);
            $user->lat = $request->newLat;
            $user->lng = $request->newLng;
            $user->save();
        } else {
            return 'guest';
        }
        return 'success';
    }

    public  static function getDistance($start, $end, $coord, $companies = false){
        if(Auth::user()){
            $latitudeFrom = Auth::user()->lat;
            $longitudeFrom = Auth::user()->lng;
        } else {
            $latitudeFrom = $coord['lat'];
            $longitudeFrom = $coord['lng'];
        }
        return self::checkDistance($latitudeFrom, $longitudeFrom, $start, $end, $companies);
    }

    public static function checkDistance($lat, $lng, $start, $end, $companies = false){
        if(!$companies){
            $companies = Company::with('users.prices.categories')->get();
        }
        $arr = [];
        $start = $start * 1000;
        $end = $end * 1000;
        foreach ($companies as $company){
            $latitudeTo = $company->lat;
            $longitudeTo = $company->lng;
            $distance = self::distanse($lat,$lng,$latitudeTo,$longitudeTo);
            if($start == 100 && $distance > $start){
                $arr[] = $company;
            } else {
                if($distance > $start && $distance < $end){
                    $arr[] = $company;
                }
            }
        }
        return $arr;
    }

    public static function distanse($lat,$lng,$latitudeTo,$longitudeTo){
        $earthRadius = 6371000;
        $latFrom = deg2rad($lat);
        $lonFrom = deg2rad($lng);
        $latTo = deg2rad($latitudeTo);
        $lonTo = deg2rad($longitudeTo);
        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;
        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
                cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
        $distance = $angle * $earthRadius;
        return $distance;
    }

    public function setCoordinatesInStorage(Request $request){
        if($request->user == 'guest'){
            $latLng = self::setGeocode($request);
            return json_encode($latLng);
        }
    }
}





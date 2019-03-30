<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\WeatherModel;


class WeatherController extends Controller
{
    //
    public function index(){
        $wm = new WeatherModel();
        $html = $wm->getHtml();
        $doc = $wm->getDoc($html);

        $time = ['Ночь', 'Утро', 'День', 'Вечер'];

        $date = $wm->actionDate($doc);
        $temp = $wm->actionTemp($doc);
        $weath = $wm->actionWeather($doc);
        $city = $wm->actionCountry($doc);

        return view('weather')->with([
            'temperature' => $temp,
            'time' => $time,
            'weather' => $weath,
            'date' => $date,
            'city' => $city
        ]);
    }    
}

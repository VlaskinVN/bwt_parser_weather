<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class WeatherController extends Controller
{
    //
    public function index(){
        if (Auth::check()){
            $html = WeatherController::curl_get("https://www.gismeteo.ua/weather-kerch-5001/"); // create class object CURL
            $doc = \phpQuery::newDocument($html); /* composer require krok/phpquer */

            $time = ['Ночь', 'Утро', 'День', 'Вечер'];

            return view('weather')->with([
                'temperature' => WeatherController::actionTemp($doc),
                'time' => $time,
                'weather' => WeatherController::actionWeather($doc),
                'date' => WeatherController::actionDate($doc),
                'city' => WeatherController::actionCountry($doc)
            ]);
        } else {
            return view('/auth/login');
        }         
    }

    private static function curl_get($url, $referer = "https://www.google.com/")
    {
        # code...
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_USERAGENT, "Chrome/10.0.648.205");
        curl_setopt($ch, CURLOPT_REFERER, $referer);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }

    private static function actionTemp($_doc)
    {       
        $temp = $_doc->find('#tbwdaily1');
        foreach ($temp as $t) {
            $pq = pq($t);            
            $str = $pq->find('.temp span.value.m_temp.c')->text();            
        }
        $arrPl = preg_split("/\s/", $str); // temperature 
        return $arrPl;
    }

    private static function actionWeather($_doc)
    {       
        $weather = $_doc->find('#tbwdaily1');
        foreach ($weather as $t) {
            $pq = pq($t);            
            $str = $pq->find('td.cltext'); 
            $results = [];
            foreach($str as $node) {
                $results []= $node->nodeValue;
            }        
        }
        return $results;
    }

    private static function actionDate($_doc)
    {       
        $date = $_doc->find('#tab_wdaily1');
        foreach ($date as $t) {
            $pq = pq($t);            
            $str = $pq->find('.date.wrap dd')->text();            
        }
        return $str;
    }

    private static function actionCountry($_doc)
    {       
        $city = $_doc->find('#weather-daily');
        foreach ($city as $t) {
            $pq = pq($t);            
            $str = $pq->find('h1.wtitle')->text();            
        }
        return $str;
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WeatherModel extends Model
{
    private $html;
    private $urlParse;
    private $doc;
    //

    public function getHtml(){
        return WeatherModel::curl_get("https://www.gismeteo.ua/weather-zaporizhia-5093/");        
    }

    public function getDoc($_html){        
        $doc = \phpQuery::newDocument($_html);
        return $doc; /* composer require krok/phpquer */
    }

    public function actionTemp($_doc)
    {               
        $str = '';
        $temp = $_doc->find('#tbwdaily1');
        foreach ($temp as $t) {
            $pq = pq($t);            
            $str = $pq->find('.temp span.value.m_temp.c')->text();      
                  
        }
        $arrPl = preg_split("/\s/", $str); // temperature 
        return $arrPl;
    }

    public function actionWeather($_doc)
    {      
        $results = []; 
        $weather = $_doc->find('#tbwdaily1');
        foreach ($weather as $t) {
            $pq = pq($t);            
            $str = $pq->find('td.cltext'); 
            
            foreach($str as $node) {
                $results []= $node->nodeValue;
            }        
        }
        return $results;
    }

    public function actionDate($_doc)
    {       
        $str = '';
        $date = $_doc->find('#tab_wdaily1');
        foreach ($date as $t) {
            $pq = pq($t);            
            $str = $pq->find('.date.wrap dd')->text();            
        }
        return $str;
    }

    public function actionCountry($_doc)
    {       
        $str = '';
        $city = $_doc->find('#weather-daily');
        foreach ($city as $t) {
            $pq = pq($t);            
            $str = $pq->find('h1.wtitle')->text();            
        }
        return $str;
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
}

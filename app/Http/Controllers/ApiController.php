<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\HelperController;

class ApiController extends Controller
{
    function getHolidays($countries)
    {
        $apikey = env('HOLIDAY_API');
        
        $today = date("Y-m-d");
        $today = explode('-', $today);
        
        $curl = curl_init();

        //switch year= to $today[0] on prod
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://holidayapi.com/v1/holidays?key=$apikey&subdivisions=false&year=2021&month=$today[1]&day=$today[2]&country=$countries",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        
        return json_decode($response, true);
    }
    
    function getCountries()
    {
        $apikey = env('HOLIDAY_API');

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://holidayapi.com/v1/countries?key=$apikey&public=true",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response, true);
    }

    function getFlag($country)
    {
        $apikey = env('HOLIDAY_API');

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://holidayapi.com/v1/countries?key=$apikey&country=$country",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $response = json_decode($response, true);
        $response = $response['countries'][0]['flag'];
        
        return $response;
    }
}

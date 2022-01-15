<?php

namespace App\Http\Controllers;
use App\Http\Controllers\ApiController;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function main(Request $request)
    {
        // $countries = ((new ApiController)->getCountries())["countries"];
        // $codes10 = (new HelperController)->splitBy10($countries);
        // unset($countries);
        // $almost = (new HelperController)->setHolidays($codes10);
        // unset($codes10);
        // $main = (new HelperController)->finalizeArray($almost);
        // unset($almost);
        
        $main = '[
            {
                "name": "Democracy Day",
                "flag": "https://www.countryflags.io/CV/flat/64.png",
                "country": 
                    [
                        "CV",
                        "MM",
                        "TH",
                        "US"
                    ]
            },
            {
                "name": "Kayin New Year",                
                "flag": "https://www.countryflags.io/MM/flat/64.png",
                "country": 
                    [
                        "MM"
                    ]
            },
            {
                "name": "Constituion Day",
                "flag": "https://www.countryflags.io/MN/flat/64.png",
                "country": 
                    [
                        "MN"
                    ]
            },
            {
                "name": "National Aviation Day",
                "flag": "https://www.countryflags.io/TH/flat/64.png",
                "country": 
                    [
                        "TH"
                    ]
            },
            {
                "name": "Stephen Foster Memorial Day",
                "flag": "https://www.countryflags.io/US/flat/64.png",
                "country": 
                    [
                        "US"
                    ]
            }
        ]';

        $main = json_decode($main, true);
        
        return $main;
    }
}

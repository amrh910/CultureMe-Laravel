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
                "country": "CV",
                "flag": "https://www.countryflags.io/CV/flat/64.png"
            },
            {
                "name": "Kayin New Year",
                "country": "MM",
                "flag": "https://www.countryflags.io/MM/flat/64.png"
            },
            {
                "name": "Constituion Day",
                "country": "MN",
                "flag": "https://www.countryflags.io/MN/flat/64.png"
            },
            {
                "name": "National Aviation Day",
                "country": "TH",
                "flag": "https://www.countryflags.io/TH/flat/64.png"
            },
            {
                "name": "Stephen Foster Memorial Day",
                "country": "US",
                "flag": "https://www.countryflags.io/US/flat/64.png"
            }
        ]';

        $main = json_decode($main, true);
        
        return $main;
    }
}

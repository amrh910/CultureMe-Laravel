<?php

namespace App\Http\Controllers;
use App\Http\Controllers\ApiController;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function main(Request $request)
    {
        // $main = array();
        $countries = ((new ApiController)->getCountries())["countries"];
        $codes10 = (new HelperController)->splitBy10($countries);
        unset($countries);
        $main = (new HelperController)->setHolidays($codes10);
        unset($codes10);
        
        return $main;
    }
}

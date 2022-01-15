<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class HelperController extends Controller
{   
    function setFlags(&$holidays)
    {
        foreach($holidays as &$holiday)
        {
            $cflags = array();
            foreach($holiday as $country)
            {
                $cflags[$country] = (new ApiController)->getFlag($country);
            }
            $holiday = $cflags;
        }
        
        return $holidays;
    }
    
    function splitBy10($countries)
    {
        $ccodes = array();
        $ccodesString = array();

        foreach($countries as $country)
        {
            array_push($ccodes, $country['code']);
        }
        
        while(count($ccodes) > 0)
        {
            $tmpString = '';
            $i = 0;
            while($i < 10)
            {
                if($tmpString == '')
                {
                    $tmpString .= array_shift($ccodes);
                    $i++;
                }
                elseif(count($ccodes) == 1)
                {
                    $tmpString .= ',' . array_shift($ccodes);
                    $i++;
                    break;
                }
                else
                {
                    $tmpString .= ',' . array_shift($ccodes);
                    $i++;
                }
            }
            
            array_push($ccodesString, $tmpString);
        }

        return $ccodesString;
    }

    function setHolidays($codes)
    {
        $main = array();
        
        foreach($codes as $code)
        {
            $holidays = ((new ApiController)->getholidays($code))['holidays'];
            if(count($holidays) > 0)
            {
                foreach($holidays as $holiday)
                {
                    if(array_key_exists($holiday['name'], $main))
                    {
                        $main[$holiday['name']] .= '-' . $holiday['country'];
                    }
                    else
                    {
                        $main[$holiday['name']] = $holiday['country'];
                    }
                }
            }
        }

        foreach($main as $key=>$ma)
        {
            $main[$key] = explode('-', $ma);
        }
        
        $main = $this->setFlags($main);

        return $main;
    }

    function finalizeArray($messy)
    {
        $main = array();
        foreach($messy as $key=>$mess)
        {
            $tmp = array();
            $tmp["name"] = $key;
            foreach($mess as $keyyed=>$me)
            {
                $tmp["country"] = $keyyed;
                $tmp["flag"] = $me;
            }
            array_push($main, $tmp);
        }
        
        return $main;
    }
}
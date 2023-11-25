<?php

namespace App\Utility;

class Math 
{
    public static $earthRadius = 6371;

    public static function distance($lat1, $lon1, $lat2, $lon2)
    {
        $lat1 = deg2rad($lat1);
        $lon1 = deg2rad($lon1);
        $lat2 = deg2rad($lat2);
        $lon2 = deg2rad($lon2);

        $latDiff = $lat2 - $lat1;
        $lonDiff = $lon2 - $lon1;

        $a = sin($latDiff / 2) ** 2 + cos($lat1) * cos($lat2) * sin($lonDiff / 2) ** 2;
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        $distance = self::$earthRadius * $c;

        return $distance;
    }

    public static function direction($lat1, $lon1, $lat2, $lon2)
    {
        $lat1 = deg2rad($lat1);
        $lon1 = deg2rad($lon1);
        $lat2 = deg2rad($lat2);
        $lon2 = deg2rad($lon2); 
        
        $lonDiff = $lon2 - $lon1;
        
        $y = sin($lonDiff) * cos($lat2);
        $x = cos($lat1) * sin($lat2) - sin($lat1) * cos($lat2) * cos($lonDiff);

        $bearing = atan2($y, $x);
        $bearing = rad2deg($bearing);

        $bearing = ($bearing + 360) % 360;
    
        return $bearing;
    }
}
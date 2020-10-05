<?php

namespace app\components;

class CalculateDistance
{
    const EARTH_RADIUS = 6372795;

    public static function run($x1, $y1, $x2, $y2)
    {
        // перевести координаты в радианы
        $lat1 = $x1 * M_PI / 180;
        $lat2 = $x2 * M_PI / 180;
        $long1 = $y1 * M_PI / 180;
        $long2 = $y2 * M_PI / 180;
         
        // косинусы и синусы широт и разницы долгот
        $cl1 = cos($lat1);
        $cl2 = cos($lat2);
        $sl1 = sin($lat1);
        $sl2 = sin($lat2);
        $delta = $long2 - $long1;
        $cdelta = cos($delta);
        $sdelta = sin($delta);
         
        // вычисления длины большого круга
        $y = sqrt(pow($cl2 * $sdelta, 2) + pow($cl1 * $sl2 - $sl1 * $cl2 * $cdelta, 2));
        $x = $sl1 * $sl2 + $cl1 * $cl2 * $cdelta;
         
        //
        $ad = atan2($y, $x);
        $dist = $ad * self::EARTH_RADIUS;

        return round($dist/1000);
    }
}


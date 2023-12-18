<?php

namespace App\Utility;

use App\Models\Cycle;
use App\Models\Ville;
use App\Utility\Math;

class CityComparator
{
    public function compareToToday($guessedId)
    {
        $current = Cycle::getCurrentVille();

        $guessedCity = Ville::with('canton')->
            where('id', $guessedId)->firstOrFail();

        return [
            'city' => $guessedCity,
            'canton_diff' =>  $current->canton_id == $guessedCity->canton_id ,
            'pop_diff' => $current->population <=> $guessedCity->population,
            'lang_diff' => self::compareLang($guessedCity, $current),
            'position_diff' => self::comparePosition($guessedCity, $current)
        ];
    }

    private static function compareLang($city1, $city2)
    {
        $city1LanguesIds = $city1->langues->map(
            function($l)
            {
                return $l->id;
            }
        )->toArray();

        $city2LanguesIds = $city2->langues->map(
            function($l)
            {
                return $l->id;
            }
        )->toArray();

        return count(array_diff($city1LanguesIds, $city2LanguesIds));
    }

    private static function comparePosition($city1, $city2)
    {
        $coord1 = $city1->coord;
        $coord2 = $city2->coord;

        // https://www.php.net/manual/en/function.list.php
        list($lat1, $long1) = explode(', ', $coord1);
        list($lat2, $long2) = explode(', ', $coord2);

        return [
            'distance' => Math::distance($lat1, $long1, $lat2, $long2),
            'direction' => Math::direction($lat1, $long1, $lat2, $long2)
        ];
    }
}

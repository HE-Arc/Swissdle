<?php

namespace App\Utility;

use App\Models\Cycle;
use App\Models\Ville;

class CityComparator
{
    public function compareToToday($guessedId)
    {
        $current = Cycle::getCurrentVille();

        $guessedCity = Ville::with('canton')->
            where('id', $guessedId)->firstOrFail();

        if($current->id == $guessedId)
        {
            return ['city' => $guessedCity];
        }
        
        return [
            'city' => $guessedCity,
            'canton_diff' =>  $current->canton_id == $guessedCity->canton_id ,
            'pop_diff' => $current->population <=> $guessedCity->population,
            'lang_diff' => self::compareLang($current, $guessedCity),
            'position_diff' => self::comparePosition()
        ];
    }

    private static function compareLang($current, $guessedCity)
    {
        $currentLanguesIds = $current->langues->map(
            function($l)
            {
                return $l->id;
            }
        )->toArray();

        $guessedLanguesIds = $guessedCity->langues->map(
            function($l)
            {
                return $l->id;
            }
        )->toArray();

        return count(array_diff($currentLanguesIds, $guessedLanguesIds));
    }

    private static function comparePosition()
    {
        return [];
    }
}
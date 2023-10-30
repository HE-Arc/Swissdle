<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cycle extends Model
{
    use HasFactory;

    protected $fillable = [
        'shuffledList',
        'index',
        'count'
    ];

    private static $delimiter = ";";

    public static function generateCycle()
    {
        $villes_ids = Ville::get()->pluck('id')->toArray();

        shuffle($villes_ids);

        $formatted_ids = implode(self::$delimiter, $villes_ids);

        $count = count($villes_ids);
        $index = 0;

        return Cycle::create(array(
            'shuffledList' => $formatted_ids,
            'index' => $index,
            'count' => $count
        ));
    }

    public static function getCurrentVille()
    {
        // Get cycle
        $cycles = self::get();

        // If no cycle, generate one
        $cycle = $cycles->isEmpty() ? self::generateCycle() : $cycles->first();

        // Decode shuffledList
        $villes_ids = explode(self::$delimiter, $cycle->shuffledList);

        // Get the ville id according to the index of the cycle
        $current_ville_id = $villes_ids[$cycle->index];

        // Get the ville
        $ville = Ville::where('id', $current_ville_id)->firstOrFail();

        // Return it
        return $ville;

    }
}

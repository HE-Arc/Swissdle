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
}

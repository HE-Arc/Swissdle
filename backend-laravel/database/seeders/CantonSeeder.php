<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CantonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cantons =
        [
            ['name' => 'Jura', 'abbrev' => 'JU', 'img' => 'jura.png'],
            ['name' => 'Zurich', 'abbrev' => 'ZH', 'img' => 'zurich.png'],
            ['name' => 'Bern', 'abbrev' => 'BE', 'img' => 'bern.png'],
            ['name' => 'Lucerne', 'abbrev' => 'LU', 'img' => 'lucerne.png'],
            ['name' => 'Uri', 'abbrev' => 'UR', 'img' => 'uri.png'],
            ['name' => 'Schwyz', 'abbrev' => 'SZ', 'img' => 'schwyz.png'],
            ['name' => 'Obwalden', 'abbrev' => 'OW', 'img' => 'obwalden.png'],
            ['name' => 'Nidwalden', 'abbrev' => 'NW', 'img' => 'nidwalden.png'],
            ['name' => 'Glarus', 'abbrev' => 'GL', 'img' => 'glarus.png'],
            ['name' => 'Zug', 'abbrev' => 'ZG', 'img' => 'zug.png'],
            ['name' => 'Fribourg', 'abbrev' => 'FR', 'img' => 'fribourg.png'],
            ['name' => 'Solothurn', 'abbrev' => 'SO', 'img' => 'solothurn.png'],
            ['name' => 'Basel-Landschaft', 'abbrev' => 'BL', 'img' => 'basel-landschaft.png'],
            ['name' => 'Basel-Stadt', 'abbrev' => 'BS', 'img' => 'basel-stadt.png'],
            ['name' => 'Schaffhausen', 'abbrev' => 'SH', 'img' => 'schaffhausen.png'],
            ['name' => 'Appenzell Ausserrhoden', 'abbrev' => 'AR', 'img' => 'appenzell-ausserrhoden.png'],
            ['name' => 'Appenzell Innerrhoden', 'abbrev' => 'AI', 'img' => 'appenzell-innerrhoden.png'],
            ['name' => 'St. Gallen', 'abbrev' => 'SG', 'img' => 'st-gallen.png'],
            ['name' => 'Grisons', 'abbrev' => 'GR', 'img' => 'grisons.png'],
            ['name' => 'Aargau', 'abbrev' => 'AG', 'img' => 'aargau.png'],
            ['name' => 'Thurgau', 'abbrev' => 'TG', 'img' => 'thurgau.png'],
            ['name' => 'Ticino', 'abbrev' => 'TI', 'img' => 'ticino.png'],
            ['name' => 'Vaud', 'abbrev' => 'VD', 'img' => 'vaud.png'],
            ['name' => 'Valais', 'abbrev' => 'VS', 'img' => 'valais.png'],
            ['name' => 'Neuchâtel', 'abbrev' => 'NE', 'img' => 'neuchatel.png'],
            ['name' => 'Geneva', 'abbrev' => 'GE', 'img' => 'geneva.png']
        ];

        foreach ($cantons as $canton)
        {
            \App\Models\Canton::create(array(
                'name' => $canton["name"],
                'abbrev' => $canton["abbrev"],
                'img' => $canton["img"]
            ));
        }
    }
}

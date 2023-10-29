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
            ['name' => 'Jura', 'img' => 'jura.png'],
            ['name' => 'Zurich', 'img' => 'zurich.png'],
            ['name' => 'Bern', 'img' => 'bern.png'],
            ['name' => 'Lucerne', 'img' => 'lucerne.png'],
            ['name' => 'Uri', 'img' => 'uri.png'],
            ['name' => 'Schwyz', 'img' => 'schwyz.png'],
            ['name' => 'Obwalden', 'img' => 'obwalden.png'],
            ['name' => 'Nidwalden', 'img' => 'nidwalden.png'],
            ['name' => 'Glarus', 'img' => 'glarus.png'],
            ['name' => 'Zug', 'img' => 'zug.png'],
            ['name' => 'Fribourg', 'img' => 'fribourg.png'],
            ['name' => 'Solothurn', 'img' => 'solothurn.png'],
            ['name' => 'Basel-Landschaft', 'img' => 'basel-landschaft.png'],
            ['name' => 'Basel-Stadt', 'img' => 'basel-stadt.png'],
            ['name' => 'Schaffhausen', 'img' => 'schaffhausen.png'],
            ['name' => 'Appenzell Ausserrhoden', 'img' => 'appenzell-ausserrhoden.png'],
            ['name' => 'Appenzell Innerrhoden', 'img' => 'appenzell-innerrhoden.png'],
            ['name' => 'St. Gallen', 'img' => 'st-gallen.png'],
            ['name' => 'Grisons', 'img' => 'grisons.png'],
            ['name' => 'Aargau', 'img' => 'aargau.png'],
            ['name' => 'Thurgau', 'img' => 'thurgau.png'],
            ['name' => 'Ticino', 'img' => 'ticino.png'],
            ['name' => 'Vaud', 'img' => 'vaud.png'],
            ['name' => 'Valais', 'img' => 'valais.png'],
            ['name' => 'Neuchâtel', 'img' => 'neuchatel.png'],
            ['name' => 'Geneva', 'img' => 'geneva.png']
        ];

        foreach ($cantons as $canton)
        {
            \App\Models\Canton::create(array(
                'name' => $canton["name"],
                'img' => $canton["img"]
            ));
        }
    }
}

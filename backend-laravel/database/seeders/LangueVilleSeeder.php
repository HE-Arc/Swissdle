<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LangueVilleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // mapping of the languages
        $languageLookup = [
            'fr' => 'Français',
            'de' => 'Suisse-Allemand',
            'it' => 'Italien',
            'ro' => 'Romanche'
        ];

        $json = file_get_contents("database/data/swissdle_data.json");
        $cities = json_decode($json);

        foreach ($cities as $city) {
            $cityId = DB::table('villes')->where('name', $city->City)->value('id');

            // In case a city has multiple languages
            $languages = explode('/', $city->Language);

            foreach ($languages as $languageCode) {
                $languageId = DB::table('langues')->where('name', $languageLookup[$languageCode])->value('id');

                DB::table('langues_villes')->insert([
                    'ville_id' => $cityId,
                    'langue_id' => $languageId,
                ]);
            }
        }
    }
}

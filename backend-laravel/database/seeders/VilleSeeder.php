<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use File;

class VilleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get("database/data/swissdle_data.json");
        $cities = json_decode($json);

        foreach ($cities as $key => $city)
        {
            $coord = 'E' . $city->E . ';N' . $city->N;

            $canton = Canton::where('abbrev', $city->Canton)->first();

            \App\Models\Ville::create(array(
                'name' => $city->City,
                'img' => $city->{'Img Link'},
                'ecusson' => "", //TODO : update the json to contain the crest of that city (optional)
                'population' => $city->Population,
                'coord' => $coord,
                'canton_id' => $canton->id
            ));
        }

    }
}

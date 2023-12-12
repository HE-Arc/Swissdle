<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Canton;

class VilleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = file_get_contents("database/data/swissdle_data.json");
        $cities = json_decode($json);

        foreach ($cities as $key => $city)
        {
            $coord = 'E' . $city->E . ';N' . $city->N;

            $canton = Canton::where('abbrev', $city->Canton)->first();

            \App\Models\Ville::create(array(
                'name' => $city->City,
                'img' => $city->Img_link,
                'ecusson' => "", //TODO : update the json to contain the crest of that city (optional)
                'population' => $city->Population,
                'coord' => $coord,
                'canton_id' => $canton->id
            ));
        }

    }
}

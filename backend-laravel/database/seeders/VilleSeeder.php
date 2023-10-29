<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VilleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            ['name' => 'Lausanne', 'img' => 'lausanne.png', 'ecusson' => 'lausanne-ecu.png', 'population' => 140000, 'coord' => '46.519961, 6.633597', 'canton_id' => 23],
            ['name' => 'Zurich', 'img' => 'zurich.png', 'ecusson' => 'zurich-ecu.png', 'population' => 400000, 'coord' => '47.376886, 8.541694', 'canton_id' => 2],
            ['name' => 'Bern', 'img' => 'bern.png', 'ecusson' => 'bern-ecu.png', 'population' => 130000, 'coord' => '46.948020, 7.447433', 'canton_id' => 3],
            ['name' => 'Lucerne', 'img' => 'lucerne.png', 'ecusson' => 'lucerne-ecu.png', 'population' => 82000, 'coord' => '47.050168, 8.309307', 'canton_id' => 4]
        ];

        foreach ($cities as $city)
        {
            \App\Models\Ville::create(array(
                'name' => $city["name"],
                'img' => $city["img"],
                'ecusson' => $city["ecusson"],
                'population' => $city["population"],
                'coord' => $city["coord"],
                'canton_id' => $city["canton_id"]
            ));
        }
        
    }
}

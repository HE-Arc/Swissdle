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
        $langues_villes = [
            ['ville_id' => 1, 'langue_id' => 1],
            ['ville_id' => 2, 'langue_id' => 2],
            ['ville_id' => 3, 'langue_id' => 1],
            ['ville_id' => 3, 'langue_id' => 2],
            ['ville_id' => 4, 'langue_id' => 2]

        ];

        foreach ($langues_villes as $langue_ville)
        {
            DB::table('langues_villes')->insert([
                'ville_id' => $langue_ville['ville_id'],
                'langue_id' => $langue_ville['langue_id']
            ]);
        }
    }
}

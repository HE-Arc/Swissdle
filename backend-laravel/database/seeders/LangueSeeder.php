<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LangueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $langues =
        [
            ['name' => 'Fr'],
            ['name' => 'De'],
            ['name' => 'It'],
            ['name' => 'Ro']
        ];

        foreach ($langues as $langue)
        {
            \App\Models\Langue::create(array(
                'name' => $langue["name"]
            ));
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Pokemon;
use Illuminate\Database\Seeder;

class PokemonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = database_path('seeders/data/pokemon.json');
        $jsonString = file_get_contents($path);
        $jsonData = json_decode($jsonString, true);

        foreach ($jsonData as $record) {
            Pokemon::firstOrCreate(
                ['pokedex_number' => $record['pokedex_number']],

                [
                    'name' => $record['name'],
                    'japanese_name' => $record['japanese_name'],
                    'generation' => $record['generation'],
                    'is_legendary' => $record['is_legendary'],
                    'type1' => $record['type1'],
                    'type2' => $record['type2'] ?? null,
                    'hp' => $record['hp'],
                    'attack' => $record['attack'],
                    'sp_attack' => $record['sp_attack'],
                    'defense' => $record['defense'],
                    'sp_defense' => $record['sp_defense'],
                    'speed' => $record['speed'],
                ]
            );
        }
    }
}

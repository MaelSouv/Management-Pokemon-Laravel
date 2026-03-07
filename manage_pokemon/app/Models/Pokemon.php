<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    protected $fillable = [
        'name',
        'japanese_name',
        'pokedex_number',
        'generation',
        'is_legendary',
        'type1',
        'type2',
        'hp',
        'attack',
        'sp_attack',
        'defense',
        'sp_defense',
        'speed',
    ];

    protected $casts = [
        'filepath' => 'string',
    ];

    public function getFilepathAttribute()
    {
        $filepath = "images/{$this->name}.png";
        return $filepath;
    }
}

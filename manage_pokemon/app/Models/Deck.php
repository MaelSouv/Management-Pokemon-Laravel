<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deck extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'slot1',
        'slot2',
        'slot3',
        'slot4',
        'slot5',
        'slot6',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function slot1Pokemon()
    {
        return $this->belongsTo(Pokemon::class, 'slot1');
    }

    public function slot2Pokemon()
    {
        return $this->belongsTo(Pokemon::class, 'slot2');
    }

    public function slot3Pokemon()
    {
        return $this->belongsTo(Pokemon::class, 'slot3');
    }

    public function slot4Pokemon()
    {
        return $this->belongsTo(Pokemon::class, 'slot4');
    }

    public function slot5Pokemon()
    {
        return $this->belongsTo(Pokemon::class, 'slot5');
    }

    public function slot6Pokemon()
    {
        return $this->belongsTo(Pokemon::class, 'slot6');
    }
}

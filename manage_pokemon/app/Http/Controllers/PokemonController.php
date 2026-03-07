<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;

class PokemonController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function pokemon()
    {
        $pokemons = Pokemon::paginate(1);

        return view('pokemon', compact('pokemons'));
    }
}

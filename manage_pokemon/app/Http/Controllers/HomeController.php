<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;

class HomeController extends Controller
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
    public function index()
    {
        // Récupère les Pokémon par pages (9 par page)
        $pokemons = Pokemon::paginate(9);

        return view('home', compact('pokemons'));
    }
}

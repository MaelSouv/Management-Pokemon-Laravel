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
        $pokemons = Pokemon::all(); // Récupère tous les Pokémon de la base de données

        return view('home', compact('pokemons'));
    }
}

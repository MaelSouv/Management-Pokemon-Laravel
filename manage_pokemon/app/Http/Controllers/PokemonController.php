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
    public function pokemon($id)
    {
        $pokemon = Pokemon::findOrFail($id);

        return view('pokemon', compact('pokemon'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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

    public function index()
    {
        $pokemons = Pokemon::orderBy('pokedex_number')->paginate(15);
        return view('pokemons.index', compact('pokemons'));
    }

    public function create()
    {
        $types = Pokemon::select('type1')->distinct()->pluck('type1')->toArray();
        $types2 = Pokemon::select('type2')->whereNotNull('type2')->distinct()->pluck('type2')->toArray();
        $types = array_values(array_unique(array_merge($types, $types2)));
        sort($types);

        return view('pokemons.create', compact('types'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'japanese_name' => ['nullable', 'string', 'max:255'],
            'is_legendary' => ['required', 'boolean'],
            'generation' => ['required', 'integer', 'min:1', 'max:8'],
            'image' => ['nullable', 'file', 'mimes:png', 'max:2048'],
            'type1' => ['required', 'string', 'max:50'],
            'type2' => ['nullable', 'string', 'max:50'],
            'hp' => ['required', 'integer', 'min:1'],
            'attack' => ['required', 'integer', 'min:1'],
            'sp_attack' => ['required', 'integer', 'min:1'],
            'defense' => ['required', 'integer', 'min:1'],
            'sp_defense' => ['required', 'integer', 'min:1'],
            'speed' => ['required', 'integer', 'min:1'],
        ]);

        $nextDex = (int) (Pokemon::max('pokedex_number') ?? 0) + 1;
        $data['pokedex_number'] = $nextDex;

        $pokemon = Pokemon::create($data);

        if ($request->hasFile('image')) {
            $dest = public_path('images');
            if (!File::exists($dest)) {
                File::makeDirectory($dest, 0755, true);
            }
            $filename = $pokemon->name.'.png';
            $request->file('image')->move($dest, $filename);
        }

        return redirect()->route('pokemon', $pokemon->id);
    }

    public function show($id)
    {
        $pokemon = Pokemon::findOrFail($id);
        return view('pokemon', compact('pokemon'));
    }

    public function edit($id)
    {
        $pokemon = Pokemon::findOrFail($id);

        $types = Pokemon::select('type1')->distinct()->pluck('type1')->toArray();
        $types2 = Pokemon::select('type2')->whereNotNull('type2')->distinct()->pluck('type2')->toArray();
        $types = array_values(array_unique(array_merge($types, $types2)));
        sort($types);

        return view('pokemons.edit', compact('pokemon', 'types'));
    }

    public function update(Request $request, $id)
    {
        $pokemon = Pokemon::findOrFail($id);

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'japanese_name' => ['nullable', 'string', 'max:255'],
            'is_legendary' => ['required', 'boolean'],
            'generation' => ['required', 'integer', 'min:1', 'max:8'],
            'image' => ['nullable', 'file', 'mimes:png', 'max:2048'],
            'type1' => ['required', 'string', 'max:50'],
            'type2' => ['nullable', 'string', 'max:50'],
            'hp' => ['required', 'integer', 'min:1'],
            'attack' => ['required', 'integer', 'min:1'],
            'sp_attack' => ['required', 'integer', 'min:1'],
            'defense' => ['required', 'integer', 'min:1'],
            'sp_defense' => ['required', 'integer', 'min:1'],
            'speed' => ['required', 'integer', 'min:1'],
        ]);

        unset($data['pokedex_number']);

        $oldName = $pokemon->name;
        $pokemon->update($data);

        if ($request->hasFile('image')) {
            $dest = public_path('images');
            if (!File::exists($dest)) {
                File::makeDirectory($dest, 0755, true);
            }
            $filename = $pokemon->name.'.png';
            $request->file('image')->move($dest, $filename);
            $oldFile = public_path('images/'.$oldName.'.png');
            if ($oldName !== $pokemon->name && File::exists($oldFile)) {
                // Optional: keep only new upload; old file can be removed if desired
                // File::delete($oldFile);
            }
        }

        return redirect()->route('pokemons.index');
    }

    public function destroy($id)
    {
        $pokemon = Pokemon::findOrFail($id);
        $pokemon->delete();
        return redirect()->route('pokemons.index');
    }

    public function pokemon($id)
    {
        $pokemon = Pokemon::findOrFail($id);

        return view('pokemon', compact('pokemon'));
    }
}

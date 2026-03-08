<?php

namespace App\Http\Controllers;

use App\Models\Deck;
use App\Models\Pokemon;
use Illuminate\Http\Request;

class DeckController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $decks = Deck::where('user_id', auth()->id())
            ->with([
                'slot1Pokemon',
                'slot2Pokemon',
                'slot3Pokemon',
                'slot4Pokemon',
                'slot5Pokemon',
                'slot6Pokemon',
            ])
            ->orderBy('name')
            ->paginate(10);

        return view('decks.index', compact('decks'));
    }

    public function create()
    {
        $pokemons = Pokemon::orderBy('name')->get();
        return view('decks.create', compact('pokemons'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $deck = new Deck(['name' => $data['name']]);
        $deck->user_id = auth()->id();
        $deck->save();

        return redirect()->route('decks.edit', $deck->id);
    }

    public function show($id)
    {
        $deck = Deck::where('user_id', auth()->id())
            ->with([
                'slot1Pokemon',
                'slot2Pokemon',
                'slot3Pokemon',
                'slot4Pokemon',
                'slot5Pokemon',
                'slot6Pokemon',
            ])
            ->findOrFail($id);

        return view('decks.show', compact('deck'));
    }

    public function edit($id)
    {
        $deck = Deck::where('user_id', auth()->id())->findOrFail($id);
        $pokemons = Pokemon::orderBy('name')->get();
        return view('decks.edit', compact('deck', 'pokemons'));
    }

    public function update(Request $request, $id)
    {
        $deck = Deck::where('user_id', auth()->id())->findOrFail($id);

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $deck->update(['name' => $data['name']]);

        return redirect()->route('decks.index');
    }

    public function destroy($id)
    {
        $deck = Deck::where('user_id', auth()->id())->findOrFail($id);
        $deck->delete();
        return redirect()->route('decks.index');
    }

    public function assign(Request $request, $id, $slot)
    {
        $deck = Deck::where('user_id', auth()->id())->findOrFail($id);

        $slotIndex = (int) $slot;
        if ($slotIndex < 1 || $slotIndex > 6) {
            abort(400, 'Slot invalide');
        }

        $data = $request->validate([
            'pokemon_id' => ['required', 'integer', 'exists:pokemon,id'],
        ]);

        $column = 'slot'.$slotIndex;
        $deck->$column = $data['pokemon_id'];
        $deck->save();

        return redirect()->route('decks.edit', $deck->id);
    }
 
    public function clear($id, $slot)
    {
        $deck = Deck::where('user_id', auth()->id())->findOrFail($id);
 
        $slotIndex = (int) $slot;
        if ($slotIndex < 1 || $slotIndex > 6) {
            abort(400, 'Slot invalide');
        }
 
        $column = 'slot' . $slotIndex;
        $deck->$column = null;
        $deck->save();
 
        return redirect()->route('decks.edit', $deck->id);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;

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
    public function index(Request $request)
    {
        $query = Pokemon::query();

        $name = $request->input('name');
        if ($name !== null && $name !== '') {
            $query->where('name', 'like', '%'.$name.'%');
        }

        $generation = $request->input('generation');
        if ($generation !== null && $generation !== '') {
            $query->where('generation', (int) $generation);
        }

        $type1 = $request->input('type1');
        $type2 = $request->input('type2');
        $selectedTypes = array_values(array_filter([$type1, $type2], function ($v) {
            return $v !== null && $v !== '';
        }));

        if (count($selectedTypes) === 1) {
            $t = $selectedTypes[0];
            $query->where(function ($q) use ($t) {
                $q->where('type1', $t)->orWhere('type2', $t);
            });
        } elseif (count($selectedTypes) === 2) {
            [$a, $b] = $selectedTypes;
            if ($a !== $b) {
                $query->where(function ($q) use ($a, $b) {
                    $q->where(function ($qq) use ($a, $b) {
                        $qq->where('type1', $a)->where('type2', $b);
                    })->orWhere(function ($qq) use ($a, $b) {
                        $qq->where('type1', $b)->where('type2', $a);
                    });
                });
            } else {
                $query->where(function ($q) use ($a) {
                    $q->where('type1', $a)->orWhere('type2', $a);
                });
            }
        }

        $isLegendary = $request->input('is_legendary');
        if ($isLegendary === '0' || $isLegendary === '1') {
            $query->where('is_legendary', (int) $isLegendary);
        }

        $pokemons = $query->paginate(9)->withQueryString();

        $types = Pokemon::select('type1')->distinct()->pluck('type1')->toArray();
        $types2 = Pokemon::select('type2')->whereNotNull('type2')->distinct()->pluck('type2')->toArray();
        $types = array_values(array_unique(array_merge($types, $types2)));
        sort($types);

        $generations = Pokemon::select('generation')->distinct()->orderBy('generation')->pluck('generation')->toArray();

        return view('home', compact('pokemons', 'types', 'generations'));
    }
}

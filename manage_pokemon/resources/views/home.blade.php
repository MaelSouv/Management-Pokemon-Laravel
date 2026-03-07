@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center">Welcome to your personal Pokémon management space</h1>
        </div>
        <div style="width:100%; margin-top:20px;">
            <form method="GET" action="{{ route('home') }}" style="display:flex; gap:12px; align-items:flex-end; flex-wrap:wrap;">
                <div style="flex:1 1 180px; min-width:180px;">
                    <label for="name">Nom anglais</label>
                    <input id="name" name="name" type="text" value="{{ request('name') }}" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:6px;">
                </div>
                <div style="flex:1 1 160px; min-width:160px;">
                    <label for="generation">Génération</label>
                    <select id="generation" name="generation" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:6px;">
                        <option value="">Toutes</option>
                        @isset($generations)
                            @foreach($generations as $gen)
                                <option value="{{ $gen }}" {{ (string)$gen === request('generation') ? 'selected' : '' }}>{{ $gen }}</option>
                            @endforeach
                        @endisset
                    </select>
                </div>
                <div style="flex:1 1 160px; min-width:160px;">
                    <label for="type1">Type 1</label>
                    <select id="type1" name="type1" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:6px;">
                        <option value="">Tous</option>
                        @isset($types)
                            @foreach($types as $t)
                                <option value="{{ $t }}" {{ $t === request('type1') ? 'selected' : '' }}>{{ strtoupper($t) }}</option>
                            @endforeach
                        @endisset
                    </select>
                </div>
                <div style="flex:1 1 160px; min-width:160px;">
                    <label for="type2">Type 2</label>
                    <select id="type2" name="type2" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:6px;">
                        <option value="">Tous</option>
                        @isset($types)
                            @foreach($types as $t)
                                <option value="{{ $t }}" {{ $t === request('type2') ? 'selected' : '' }}>{{ strtoupper($t) }}</option>
                            @endforeach
                        @endisset
                    </select>
                </div>
                <div style="flex:1 1 160px; min-width:160px;">
                    <label for="is_legendary">Légendaire</label>
                    <select id="is_legendary" name="is_legendary" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:6px;">
                        <option value="">Tous</option>
                        <option value="1" {{ request('is_legendary') === '1' ? 'selected' : '' }}>Oui</option>
                        <option value="0" {{ request('is_legendary') === '0' ? 'selected' : '' }}>Non</option>
                    </select>
                </div>
                <div style="display:flex; gap:8px;">
                    <button type="submit" style="padding:10px 16px; border:1px solid #333; border-radius:6px; background:#333; color:#fff;">Filtrer</button>
                    <a href="{{ route('home') }}" style="padding:10px 16px; border:1px solid #ccc; border-radius:6px; background:#fff; color:#333; text-decoration:none;">Réinitialiser</a>
                </div>
            </form>
        </div>
        <div style="display:flex; justify-content:center; gap:20px; flex-wrap:wrap; margin-top:20px;">
            @foreach($pokemons as $pokemon)
                <a href="{{ route('pokemon', $pokemon->id) }}" style="display:block; flex:1 1 30%; min-width:200px; border:1px solid #ccc; border-radius:8px; padding:20px; text-align:center; box-shadow:0 2px 5px rgba(0,0,0,0.1); text-decoration:none; color:inherit;">
                    <h5>{{ $pokemon->name }}</h5>
                    <img class="pokemon-card-image" src="{{ asset($pokemon->filepath) }}" alt="{{ $pokemon->name }}">
                </a>
            @endforeach
        </div>
        <div class="pagination-wrapper">
            {{ $pokemons->links('pagination::pokemon') }}
        </div>
    </div>
</div>
@endsection

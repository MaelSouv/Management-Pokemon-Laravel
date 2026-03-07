@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center">Welcome to your personal Pokémon management space</h1>
        </div>
        <div style="display:flex; justify-content:center; gap:20px; flex-wrap:wrap; margin-top:20px;">
            @foreach($pokemons as $pokemon)
                <div style="flex:1 1 30%; min-width:200px; border:1px solid #ccc; border-radius:8px; padding:20px; text-align:center; box-shadow:0 2px 5px rgba(0,0,0,0.1);">
                    <h5>{{ $pokemon->name }}</h5>
                    <p>{{ $pokemon->japanese_name }}</p>
                    <p>{{ $pokemon->pokedex_number }}</p>
                    <img class="pokemon-card-image" src="{{ asset($pokemon->filepath) }}" alt="{{ $pokemon->name }}">
                    <p>{{ $pokemon->type1 }}</p>
                    <p>{{ $pokemon->type2 }}</p>

                </div>
            @endforeach
        </div>
        <div class="pagination-wrapper">
            {{ $pokemons->links('pagination::pokemon') }}
        </div>
    </div>
</div>
@endsection

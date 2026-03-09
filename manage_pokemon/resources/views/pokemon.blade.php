@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div style="display:grid; grid-template-columns: 1fr auto 1fr; align-items:center;">
                <div style="justify-self:start;">
                    <button type="button" onclick="history.back()" style="padding:10px 16px; border:1px solid #ccc; border-radius:6px; background:#fff; color:#333;">Back</button>
                </div>
                <h1 class="text-center" style="margin:0;">Welcome to the page about {{ $pokemon->name }}</h1>
                <div></div>
            </div>
        </div>
        <div style="display:flex; justify-content:center; gap:20px; flex-wrap:wrap; margin-top:20px;">
            <div style="flex:1 1 30%; min-width:200px; border:1px solid #ccc; border-radius:8px; padding:20px; text-align:center; box-shadow:0 2px 5px rgba(0,0,0,0.1);">
                <h5>Name : {{ $pokemon->name }}</h5>
                <p>Japanese Name : {{ $pokemon->japanese_name }}</p>
                <p>Pokedex Number : {{ $pokemon->pokedex_number }}</p>
                <img class="pokemon-card-image" src="{{ asset($pokemon->filepath) }}" alt="{{ $pokemon->name }}">
                <p>{{ strtoupper($pokemon->type1) }} {{ $pokemon->type2 ? strtoupper($pokemon->type2) : '' }}</p>
                <p>Generation: {{ $pokemon->generation }}</p>
                <p>Legendary: {{ $pokemon->is_legendary ? 'Yes' : 'No' }}</p>
                <p>HP: {{ $pokemon->hp }}</p>
                <p>Attack: {{ $pokemon->attack }}</p>
                <p>Sp. Attack: {{ $pokemon->sp_attack }}</p>
                <p>Defense: {{ $pokemon->defense }}</p>
                <p>Sp. Defense: {{ $pokemon->sp_defense }}</p>
                <p>Speed: {{ $pokemon->speed }}</p>
            </div>
        </div>
    </div>
</div>
@endsection

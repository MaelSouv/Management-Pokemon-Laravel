@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center">Welcome to your personal Pokémon management space</h1>
        </div>
        <div style="display:flex; justify-content:center; gap:20px; flex-wrap:wrap; margin-top:20px;">
            <div style="flex:1 1 30%; min-width:200px; border:1px solid #ccc; border-radius:8px; padding:20px; text-align:center; box-shadow:0 2px 5px rgba(0,0,0,0.1);">
                <h5>Pokémon 1</h5>
                <p>Description du Pokémon 1.</p>
            </div>
            <div style="flex:1 1 30%; min-width:200px; border:1px solid #ccc; border-radius:8px; padding:20px; text-align:center; box-shadow:0 2px 5px rgba(0,0,0,0.1);">
                <h5>Pokémon 2</h5>
                <p>Description du Pokémon 2.</p>
            </div>
            <div style="flex:1 1 30%; min-width:200px; border:1px solid #ccc; border-radius:8px; padding:20px; text-align:center; box-shadow:0 2px 5px rgba(0,0,0,0.1);">
                <h5>Pokémon 3</h5>
                <p>Description du Pokémon 3.</p>
            </div>
        </div>
    </div>
</div>
@endsection

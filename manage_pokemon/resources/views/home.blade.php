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
                    <p>{{ $pokemon->description }}</p>
                    <img src="{{ asset($pokemon->filepath) }}" alt="{{ $pokemon->name }}" style="width:100px; height:100px; object-fit:cover; margin-top:10px;">
                </div>
            @endforeach
        </div>
        <div class="pagination" style="display:flex; justify-content:center; margin-top:20px;">
            {{ $pokemons->links() }}
    </div>
</div>
@endsection

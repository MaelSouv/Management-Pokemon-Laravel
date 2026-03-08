@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center">Create Deck</h1>
            <form method="POST" action="{{ route('decks.store') }}" style="margin-top:16px;">
                @csrf
                <div style="margin-bottom:12px;">
                    <label for="name">Deck Name</label>
                    <input id="name" name="name" type="text" value="{{ old('name') }}" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:6px;">
                </div>
                <p style="margin-top:8px;">After creation, you can add Pokémon to slots via the catalog.</p>
                <div style="margin-top:16px; display:flex; gap:8px;">
                    <button type="submit" style="padding:10px 16px; border:1px solid #333; border-radius:6px; background:#333; color:#fff;">Save</button>
                    <a href="{{ route('decks.index') }}" style="padding:10px 16px; border:1px solid #ccc; border-radius:6px; background:#fff; color:#333; text-decoration:none;">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

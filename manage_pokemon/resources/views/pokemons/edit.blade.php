@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center">Edit {{ $pokemon->name }}</h1>
            <form method="POST" action="{{ route('pokemons.update', $pokemon->id) }}" enctype="multipart/form-data" style="margin-top:16px;">
                @csrf
                @method('PUT')
                <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                    <div>
                        <label for="name">Name</label>
                        <input id="name" name="name" type="text" value="{{ old('name', $pokemon->name) }}" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:6px;">
                    </div>
                    <div>
                        <label for="japanese_name">Japanese Name</label>
                        <input id="japanese_name" name="japanese_name" type="text" value="{{ old('japanese_name', $pokemon->japanese_name) }}" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:6px;">
                    </div>
                    <div>
                        <label>Pokedex Number</label>
                        <div style="padding:8px; border:1px dashed #ccc; border-radius:6px; background:#f9f9f9;">{{ $pokemon->pokedex_number }}</div>
                    </div>
                    <div>
                        <label for="generation">Generation</label>
                        <select id="generation" name="generation" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:6px;">
                            @for($g = 1; $g <= 8; $g++)
                                <option value="{{ $g }}" {{ (string) $g === old('generation', (string) $pokemon->generation) ? 'selected' : '' }}>{{ $g }}</option>
                            @endfor
                        </select>
                    </div>
                    <div>
                        <label for="is_legendary">Legendary</label>
                        <select id="is_legendary" name="is_legendary" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:6px;">
                            <option value="0" {{ old('is_legendary', (string) $pokemon->is_legendary) === '0' ? 'selected' : '' }}>No</option>
                            <option value="1" {{ old('is_legendary', (string) $pokemon->is_legendary) === '1' ? 'selected' : '' }}>Yes</option>
                        </select>
                    </div>
                    <div>
                        <label for="type1">Type 1</label>
                        <select id="type1" name="type1" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:6px;">
                            @foreach($types as $t)
                                <option value="{{ $t }}" {{ old('type1', $pokemon->type1) === $t ? 'selected' : '' }}>{{ strtoupper($t) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="type2">Type 2</label>
                        <select id="type2" name="type2" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:6px;">
                            <option value="">None</option>
                            @foreach($types as $t)
                                <option value="{{ $t }}" {{ old('type2', $pokemon->type2) === $t ? 'selected' : '' }}>{{ strtoupper($t) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="hp">HP</label>
                        <input id="hp" name="hp" type="number" value="{{ old('hp', $pokemon->hp) }}" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:6px;">
                    </div>
                    <div>
                        <label for="attack">Attack</label>
                        <input id="attack" name="attack" type="number" value="{{ old('attack', $pokemon->attack) }}" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:6px;">
                    </div>
                    <div>
                        <label for="sp_attack">Sp. Attack</label>
                        <input id="sp_attack" name="sp_attack" type="number" value="{{ old('sp_attack', $pokemon->sp_attack) }}" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:6px;">
                    </div>
                    <div>
                        <label for="defense">Defense</label>
                        <input id="defense" name="defense" type="number" value="{{ old('defense', $pokemon->defense) }}" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:6px;">
                    </div>
                    <div>
                        <label for="sp_defense">Sp. Defense</label>
                        <input id="sp_defense" name="sp_defense" type="number" value="{{ old('sp_defense', $pokemon->sp_defense) }}" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:6px;">
                    </div>
                    <div>
                        <label for="speed">Speed</label>
                        <input id="speed" name="speed" type="number" value="{{ old('speed', $pokemon->speed) }}" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:6px;">
                    </div>
                    <div style="grid-column: 1 / -1;">
                        <label>Current Image</label>
                        <img class="pokemon-card-image" src="{{ asset($pokemon->filepath) }}" alt="{{ $pokemon->name }}">
                    </div>
                    <div style="grid-column: 1 / -1;">
                        <label for="image">Replace Image (PNG)</label>
                        <input id="image" name="image" type="file" accept="image/png" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:6px;">
                    </div>
                </div>
                <div style="margin-top:16px; display:flex; gap:8px;">
                    <button type="submit" style="padding:10px 16px; border:1px solid #333; border-radius:6px; background:#333; color:#fff;">Save</button>
                    <a href="{{ route('pokemons.index') }}" style="padding:10px 16px; border:1px solid #ccc; border-radius:6px; background:#fff; color:#333; text-decoration:none;">Cancel</a>
                    <a href="{{ route('pokemon', $pokemon->id) }}" style="padding:10px 16px; border:1px solid #ccc; border-radius:6px; background:#fff; color:#333; text-decoration:none;">View</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

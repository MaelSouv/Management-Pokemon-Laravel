@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1 class="text-center">Pokemons</h1>
            <div style="margin-top:16px;">
                <a href="{{ route('pokemons.create') }}" style="padding:10px 16px; border:1px solid #333; border-radius:6px; background:#333; color:#fff; text-decoration:none;">Create Pokemon</a>
            </div>
            <div style="margin-top:20px;">
                <table style="width:100%; border-collapse:collapse;">
                    <thead>
                        <tr>
                            <th style="border-bottom:1px solid #ccc; padding:8px; text-align:left;">#</th>
                            <th style="border-bottom:1px solid #ccc; padding:8px; text-align:left;">Name</th>
                            <th style="border-bottom:1px solid #ccc; padding:8px; text-align:left;">Types</th>
                            <th style="border-bottom:1px solid #ccc; padding:8px; text-align:left;">Generation</th>
                            <th style="border-bottom:1px solid #ccc; padding:8px; text-align:left;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pokemons as $pokemon)
                            <tr>
                                <td style="border-bottom:1px solid #eee; padding:8px;">{{ $pokemon->pokedex_number }}</td>
                                <td style="border-bottom:1px solid #eee; padding:8px;">
                                    <a href="{{ route('pokemon', $pokemon->id) }}" style="text-decoration:none;">{{ $pokemon->name }}</a>
                                </td>
                                <td style="border-bottom:1px solid #eee; padding:8px;">{{ strtoupper($pokemon->type1) }} {{ $pokemon->type2 ? '/ '.strtoupper($pokemon->type2) : '' }}</td>
                                <td style="border-bottom:1px solid #eee; padding:8px;">{{ $pokemon->generation }}</td>
                                <td style="border-bottom:1px solid #eee; padding:8px;">
                                    <a href="{{ route('pokemons.edit', $pokemon->id) }}" style="padding:6px 10px; border:1px solid #333; border-radius:6px; background:#fff; color:#333; text-decoration:none; margin-right:6px;">Edit</a>
                                    <form method="POST" action="{{ route('pokemons.destroy', $pokemon->id) }}" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="padding:6px 10px; border:1px solid #d33; border-radius:6px; background:#d33; color:#fff;" onclick="return Delete {{ $pokemon->name }}?');">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination-wrapper" style="margin-top:12px;">
                    {{ $pokemons->links('pagination::pokemon') }}
                </div>
            </div>
        </div>
    </div>
@endsection

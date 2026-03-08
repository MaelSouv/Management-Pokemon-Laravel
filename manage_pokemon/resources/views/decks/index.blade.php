@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1 class="text-center">My Decks</h1>
            <div style="margin-top:16px;">
                <a href="{{ route('decks.create') }}" style="padding:10px 16px; border:1px solid #333; border-radius:6px; background:#333; color:#fff; text-decoration:none;">Create Deck</a>
            </div>
            <div style="display:flex; gap:20px; flex-wrap:wrap; margin-top:20px;">
                @forelse($decks as $deck)
                    <div style="flex:1 1 30%; min-width:260px; border:1px solid #ccc; border-radius:8px; padding:16px;">
                        <h5 style="margin-bottom:8px;">{{ $deck->name }}</h5>
                        <div style="display:grid; grid-template-columns: repeat(3, 1fr); gap:8px;">
                            <div style="text-align:center;">
                                @if($deck->slot1Pokemon)
                                    <div>{{ $deck->slot1Pokemon->name }}</div>
                                    <img class="pokemon-card-image" src="{{ asset($deck->slot1Pokemon->filepath) }}" alt="{{ $deck->slot1Pokemon->name }}" style="margin-top:6px;">
                                @else
                                    Empty
                                @endif
                            </div>
                            <div style="text-align:center;">
                                @if($deck->slot2Pokemon)
                                    <div>{{ $deck->slot2Pokemon->name }}</div>
                                    <img class="pokemon-card-image" src="{{ asset($deck->slot2Pokemon->filepath) }}" alt="{{ $deck->slot2Pokemon->name }}" style="margin-top:6px;">
                                @else
                                    Empty
                                @endif
                            </div>
                            <div style="text-align:center;">
                                @if($deck->slot3Pokemon)
                                    <div>{{ $deck->slot3Pokemon->name }}</div>
                                    <img class="pokemon-card-image" src="{{ asset($deck->slot3Pokemon->filepath) }}" alt="{{ $deck->slot3Pokemon->name }}" style="margin-top:6px;">
                                @else
                                    Empty
                                @endif
                            </div>
                            <div style="text-align:center;">
                                @if($deck->slot4Pokemon)
                                    <div>{{ $deck->slot4Pokemon->name }}</div>
                                    <img class="pokemon-card-image" src="{{ asset($deck->slot4Pokemon->filepath) }}" alt="{{ $deck->slot4Pokemon->name }}" style="margin-top:6px;">
                                @else
                                    Empty
                                @endif
                            </div>
                            <div style="text-align:center;">
                                @if($deck->slot5Pokemon)
                                    <div>{{ $deck->slot5Pokemon->name }}</div>
                                    <img class="pokemon-card-image" src="{{ asset($deck->slot5Pokemon->filepath) }}" alt="{{ $deck->slot5Pokemon->name }}" style="margin-top:6px;">
                                @else
                                    Empty
                                @endif
                            </div>
                            <div style="text-align:center;">
                                @if($deck->slot6Pokemon)
                                    <div>{{ $deck->slot6Pokemon->name }}</div>
                                    <img class="pokemon-card-image" src="{{ asset($deck->slot6Pokemon->filepath) }}" alt="{{ $deck->slot6Pokemon->name }}" style="margin-top:6px;">
                                @else
                                    Empty
                                @endif
                            </div>
                        </div>
                        <div style="display:flex; gap:8px; margin-top:12px;">
                            <a href="{{ route('decks.show', $deck->id) }}" style="padding:8px 12px; border:1px solid #ccc; border-radius:6px; background:#fff; color:#333; text-decoration:none;">View</a>
                            <a href="{{ route('decks.edit', $deck->id) }}" style="padding:8px 12px; border:1px solid #333; border-radius:6px; background:#333; color:#fff; text-decoration:none;">Edit</a>
                            <form method="POST" action="{{ route('decks.destroy', $deck->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="padding:8px 12px; border:1px solid #d33; border-radius:6px; background:#d33; color:#fff;">Delete</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p>Aucun deck pour le moment.</p>
                @endforelse
            </div>
            <div class="pagination-wrapper">
                {{ $decks->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

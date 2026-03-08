@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center">Edit Deck</h1>
            <form method="POST" action="{{ route('decks.update', $deck->id) }}" style="margin-top:16px;">
                @csrf
                @method('PUT')
                <div style="margin-bottom:12px;">
                    <label for="name">Deck Name</label>
                    <input id="name" name="name" type="text" value="{{ old('name', $deck->name) }}" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:6px;">
                </div>
                <div style="margin-top:16px; display:flex; gap:8px;">
                    <button type="submit" style="padding:10px 16px; border:1px solid #333; border-radius:6px; background:#333; color:#fff;">Save</button>
                    <a href="{{ route('decks.index') }}" style="padding:10px 16px; border:1px solid #ccc; border-radius:6px; background:#fff; color:#333; text-decoration:none;">Cancel</a>
                </div>
            </form>
            <div style="display:grid; grid-template-columns: repeat(2, 1fr); gap:12px; margin-top:16px;">
                @for ($i = 1; $i <= 6; $i++)
                    @php $field = 'slot'.$i; @endphp
                    <div>
                        <label>Slot {{ $i }}</label>
                        <div style="padding:8px; border:1px solid #ccc; border-radius:6px; background:#f9f9f9;">
                            @if($deck->{'slot'.$i.'Pokemon'})
                                <div>{{ $deck->{'slot'.$i.'Pokemon'}->name }}</div>
                                <img class="pokemon-card-image" src="{{ asset($deck->{'slot'.$i.'Pokemon'}->filepath) }}" alt="{{ $deck->{'slot'.$i.'Pokemon'}->name }}" style="margin-top:6px;">
                            @else
                                Empty
                            @endif
                        </div>
                        <div style="margin-top:6px; display:flex; gap:8px; align-items:center;">
                            <a href="{{ route('home', ['deck_id' => $deck->id, 'slot' => $i]) }}" style="padding:6px 10px; border:1px solid #333; border-radius:6px; background:#fff; color:#333; text-decoration:none;">
                                Choose from catalog
                            </a>
                            @if($deck->{'slot'.$i.'Pokemon'})
                                <form method="POST" action="{{ route('decks.slot.clear', ['id' => $deck->id, 'slot' => $i]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="padding:6px 10px; border:1px solid #d33; border-radius:6px; background:#d33; color:#fff;">
                                        Delete
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
</div>
@endsection

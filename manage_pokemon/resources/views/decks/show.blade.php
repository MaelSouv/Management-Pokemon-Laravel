@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center">{{ $deck->name }}</h1>
            <div style="display:grid; grid-template-columns: repeat(3, 1fr); gap:12px; margin-top:16px;">
                <div style="border:1px solid #ccc; border-radius:8px; padding:12px; text-align:center;">
                    <strong>Slot 1</strong>
                    @if($deck->slot1Pokemon)
                        <div style="margin-top:6px;">{{ $deck->slot1Pokemon->name }}</div>
                        <img class="pokemon-card-image" src="{{ asset($deck->slot1Pokemon->filepath) }}" alt="{{ $deck->slot1Pokemon->name }}" style="margin-top:6px;">
                    @else
                        <div style="margin-top:6px;">Empty</div>
                    @endif
                </div>
                <div style="border:1px solid #ccc; border-radius:8px; padding:12px; text-align:center;">
                    <strong>Slot 2</strong>
                    @if($deck->slot2Pokemon)
                        <div style="margin-top:6px;">{{ $deck->slot2Pokemon->name }}</div>
                        <img class="pokemon-card-image" src="{{ asset($deck->slot2Pokemon->filepath) }}" alt="{{ $deck->slot2Pokemon->name }}" style="margin-top:6px;">
                    @else
                        <div style="margin-top:6px;">Empty</div>
                    @endif
                </div>
                <div style="border:1px solid #ccc; border-radius:8px; padding:12px; text-align:center;">
                    <strong>Slot 3</strong>
                    @if($deck->slot3Pokemon)
                        <div style="margin-top:6px;">{{ $deck->slot3Pokemon->name }}</div>
                        <img class="pokemon-card-image" src="{{ asset($deck->slot3Pokemon->filepath) }}" alt="{{ $deck->slot3Pokemon->name }}" style="margin-top:6px;">
                    @else
                        <div style="margin-top:6px;">Empty</div>
                    @endif
                </div>
                <div style="border:1px solid #ccc; border-radius:8px; padding:12px; text-align:center;">
                    <strong>Slot 4</strong>
                    @if($deck->slot4Pokemon)
                        <div style="margin-top:6px;">{{ $deck->slot4Pokemon->name }}</div>
                        <img class="pokemon-card-image" src="{{ asset($deck->slot4Pokemon->filepath) }}" alt="{{ $deck->slot4Pokemon->name }}" style="margin-top:6px;">
                    @else
                        <div style="margin-top:6px;">Empty</div>
                    @endif
                </div>
                <div style="border:1px solid #ccc; border-radius:8px; padding:12px; text-align:center;">
                    <strong>Slot 5</strong>
                    @if($deck->slot5Pokemon)
                        <div style="margin-top:6px;">{{ $deck->slot5Pokemon->name }}</div>
                        <img class="pokemon-card-image" src="{{ asset($deck->slot5Pokemon->filepath) }}" alt="{{ $deck->slot5Pokemon->name }}" style="margin-top:6px;">
                    @else
                        <div style="margin-top:6px;">Empty</div>
                    @endif
                </div>
                <div style="border:1px solid #ccc; border-radius:8px; padding:12px; text-align:center;">
                    <strong>Slot 6</strong>
                    @if($deck->slot6Pokemon)
                        <div style="margin-top:6px;">{{ $deck->slot6Pokemon->name }}</div>
                        <img class="pokemon-card-image" src="{{ asset($deck->slot6Pokemon->filepath) }}" alt="{{ $deck->slot6Pokemon->name }}" style="margin-top:6px;">
                    @else
                        <div style="margin-top:6px;">Empty</div>
                    @endif
                </div>
            </div>
            <div style="margin-top:16px; display:flex; gap:8px;">
                <a href="{{ route('decks.edit', $deck->id) }}" style="padding:10px 16px; border:1px solid #333; border-radius:6px; background:#333; color:#fff; text-decoration:none;">Edit</a>
                <a href="{{ route('decks.index') }}" style="padding:10px 16px; border:1px solid #ccc; border-radius:6px; background:#fff; color:#333; text-decoration:none;">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection

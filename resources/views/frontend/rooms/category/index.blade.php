@extends('layouts.app')

@section('title', 'All Rooms')
@section('content')

    <div class="container">
        <livewire:frontend.room.index />
        {{-- <livewire:frontend.room.index :category="$category"/> --}}
    </div>

@endsection
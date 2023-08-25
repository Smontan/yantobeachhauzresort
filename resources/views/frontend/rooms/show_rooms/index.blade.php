@extends('layouts.app')

@section('title', 'Show Rooms')

@section('content')
    
<div class="container">
    <div class="row text-center">
        <h4>Our Rooms </h4>
    </div>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

        <livewire:frontend.room.index :rooms="$rooms" :category="$category" />

    </div>
</div>
    
@endsection
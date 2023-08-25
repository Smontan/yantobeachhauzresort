@extends('layouts.app')

@section('title', 'Room Reservation')

@section('content')

<livewire:reservation.index :roomId="$roomId" />


    
@endsection
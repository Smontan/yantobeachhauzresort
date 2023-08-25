@extends('layouts.app')

@section('content')

<livewire:user.reservation.index :userReservations="$userReservations"/>
  
@endsection
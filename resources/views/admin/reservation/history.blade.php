@extends('layouts.admin')

@section('content')

<livewire:admin.reservation.history :reservations="$reservations" />
    
@endsection
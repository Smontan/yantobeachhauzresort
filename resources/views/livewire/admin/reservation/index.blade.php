<div>
    <!-- Confirm Reservation Modal -->
    <div wire:ignore.self class="modal fade" id="confirmedModal" tabindex="-1" aria-labelledby="confirmedReservationLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="confirmedReservationLabel">Confirm Reservation</h1>
            <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
    
            <form wire:submit.prevent="confirmedReservation">

                <div class="modal-body">
                <p>Are you sure you want to Confirmed this Reservation?</p>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">No</button>
                <button type="submit" data-bs-dismiss="modal"  class="btn btn-success">Yes</button>
                </div>
            </form>     
            
        </div>
        </div>
    </div>
    <!-- Edit the pending date Reservation Modal -->
    <div wire:ignore.self class="modal fade" id="editPendingReservation" tabindex="-1" aria-labelledby="editPendingReservationLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                
            <h1 class="modal-title fs-5" >Edit Pending Reservation Date</h1>
            <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
    
            <form wire:submit.prevent="confirmEditReservation">
                @csrf
                <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="">Check in</label>
                        <input type="date" class="form-control" wire:model.defer="check_in" >
                        @error('check_in')<small> <span class="text-danger"> {{ $message }}</span></small> @enderror

                    </div>
                    <div class="col-md-6 form-group">
                        <label for="">Check out</label>
                        <input type="date" class="form-control" wire:model.defer="check_out">
                        @error('check_out')<small> <span class="text-danger"> {{ $message }}</span></small> @enderror

                    </div>
                    
                </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" data-bs-dismiss="modal"  class="btn btn-primary">Update</button>
                </div>
            </form>     
            
        </div>
        </div>
    </div>
    <!-- Cancel Reservation Modal -->
    <div wire:ignore.self class="modal fade" id="cancelReservation" tabindex="-1" aria-labelledby="cancelReservationLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="cancelReservationLabel">Cancel Reservation</h1>
            <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
    
            <form wire:submit.prevent="confirmCancelReservation">

                <div class="modal-body">
                <p>Are you sure you want to Cancel this Reservation</p>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">No</button>
                <button type="submit" data-bs-dismiss="modal"  class="btn btn-danger">Yes, Cancel</button>
                </div>
            </form>     
            
        </div>
        </div>
    </div>
    <!-- Check-out Reservation Modal -->
    <div wire:ignore.self class="modal fade" id="checkoutReservation" tabindex="-1" aria-labelledby="checkoutReservationLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="checkoutReservationLabel">Cancel Reservation</h1>
            <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
    
            <form wire:submit.prevent="confirmCheckoutReservation">

                <div class="modal-body">
                <p>Are you sure you want to Checkout this Reservation</p>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">No</button>
                <button type="submit" data-bs-dismiss="modal"  class="btn btn-success">Yes</button>
                </div>
            </form>     
            
        </div>
        </div>
    </div>




    @if (session('message'))
    <h4 class="alert alert-success">
    {{session('message')}}
    </h4>
    @endif
    <div class="col-lg-12 grid-margin stretch-card">
    
        <div class="card">
            <div class="card-header ">
                <h3>RESERVATIONS
                    <a href="{{url('/admin/reservation/create')}}" class="btn btn-primary float-end">ADD RESERVATION</a>
                </h3>
                
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending-tab-pane" type="button" role="tab" aria-controls="pending-tab-pane" aria-selected="true">Pending Reservations</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="confirmed-tab" data-bs-toggle="tab" data-bs-target="#confirmed-tab-pane" type="button" role="tab" aria-controls="confirmed-tab-pane" aria-selected="false">Confirmed Reservations</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="checkin-tab" data-bs-toggle="tab" data-bs-target="#checkin-tab-pane" type="button" role="tab" aria-controls="checkin-tab-pane" aria-selected="false">Check In</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane border p-3 fade show active" id="pending-tab-pane" role="tabpanel" aria-labelledby="pending-tab" tabindex="0">  
                        <div class="row mt-4" >
                            <div class="table-responsive">
                                <table class="table table-striped border">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Room ID</th>
                                            <th>Room Name</th>
                                            <th>Full name</th>
                                            <th>Phone</th>
                                            <th>Check-in</th>
                                            <th>Check-out</th>
                                            <th>#Guest</th>
                                            <th>Status</th>
                                            <th>Total Amount</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @forelse ($reservations as $reservation)
                                        
                                            @if ($reservation->status == 'pending')
                                            
                                                <tr>
                                                    <td>{{$reservation->id}} </td>
                                                    <td>{{$reservation->room_id}} </td>
                                                    <td>{{$reservation->room->name}} </td>
                                                    <td>{{$reservation->first_name.' '.$reservation->last_name}} </td>
                                                    <td>{{$reservation->phone}} </td>
                                                    <td>{{$reservation->check_in}} </td>
                                                    <td>{{$reservation->check_out}} </td>
                                                    <td>{{$reservation->num_guests}} </td>
                                                    <td>{{$reservation->status}} </td>
                                                    <td>{{$reservation->total_price}} </td>
                                                    <td>

                                                        {{-- <a href="#" class="btn btn-primary btn-sm text-white" wire:click="editPendingReservation({{$reservation->id}})" data-bs-toggle="modal" data-bs-target="#editPendingReservation">Edit</a> --}}
                                                        <a href="#" class="btn btn-success btn-sm text-white" wire:click="addReservation({{$reservation->id}})" data-bs-toggle="modal" data-bs-target="#confirmedModal">Confirmed</a>
                                                        <a href="#" class="btn btn-danger text-white  btn-sm" data-bs-toggle="modal" data-bs-target="#cancelReservation" wire:click="cancelReservation({{$reservation->id}})" >Cancel</a>
                                                    </td>
                                                </tr>
                                    
                                            @endif
                                        @empty

                                        <tr>
                                            <td colspan="11" class="text-center"><span class="text-center h4" >No Reservations as of now</span></td>
                                        </tr>
                                        @endforelse
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane border p-3 fade" id="confirmed-tab-pane" role="tabpanel" aria-labelledby="confirmed-tab" tabindex="0">
                        <div class="row mt-4" >
                            <div class="table-responsive">
                                <table class="table table-striped border">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Room ID</th>
                                            <th>Room Name</th>
                                            <th>Full name</th>
                                            <th>Phone</th>
                                            <th>Check-in</th>
                                            <th>Check-out</th>
                                            <th>#Guest</th>
                                            <th>Status</th>
                                            <th>Total Amount</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($reservations as $reservation)
                                            @if ($reservation->status == 'confirmed')
                                                <tr>
                                                    <td>{{$reservation->id}} </td>
                                                    <td>{{$reservation->room_id}} </td>
                                                    <td>{{$reservation->room->name}} </td>
                                                    <td>{{$reservation->first_name.' '.$reservation->last_name}} </td>
                                                    <td>{{$reservation->phone}} </td>
                                                    <td>{{$reservation->check_in}} </td>
                                                    <td>{{$reservation->check_out}} </td>
                                                    <td>{{$reservation->num_guests}} </td>
                                                    <td>{{$reservation->status}} </td>
                                                    <td>{{$reservation->total_price}} </td>
                                                    <td>
                                                        
                                                        <a href="#" class="btn btn-danger text-white btn-sm" data-bs-toggle="modal" data-bs-target="#cancelReservation" wire:click="cancelReservation({{$reservation->id}})" >Cancel</a>
                                                    </td>
                                                </tr>
                                    
                                            @endif
                                        @empty
                                        <tr>
                                            <td colspan="11" class="text-center"><span class="text-center h4" >No Reservations as of now</span></td>
                                        </tr>
                                        @endforelse
                                        
                                    </tbody>
                                
                                </table>
                                <div class="mt-3 ">
                                    {{-- {{$reservations->links()}} --}}
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="tab-pane border p-3 fade" id="checkin-tab-pane" role="tabpanel" aria-labelledby="checkin-tab" tabindex="0">
                        <div class="row mt-4" >
                            <div class="table-responsive">
                                <table class="table table-striped border">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Room ID</th>
                                            <th>Room Name</th>
                                            <th>Full name</th>
                                            <th>Phone</th>
                                            <th>Check-in</th>
                                            <th>Check-out</th>
                                            <th>#Guest</th>
                                            <th>Status</th>
                                            <th>Total Amount</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($reservations as $reservation)
                                            @if ($reservation->status == 'checkin')
                                                <tr>
                                                    <td>{{$reservation->id}} </td>
                                                    <td>{{$reservation->room_id}} </td>
                                                    <td>{{$reservation->room->name}} </td>
                                                    <td>{{$reservation->first_name.' '.$reservation->last_name}} </td>
                                                    <td>{{$reservation->phone}} </td>
                                                    <td>{{$reservation->check_in}} </td>
                                                    <td>{{$reservation->check_out}} </td>
                                                    <td>{{$reservation->num_guests}} </td>
                                                    <td>{{$reservation->status}} </td>
                                                    <td>{{$reservation->total_price}} </td>
                                                    <td>
                                                        <a href="#" class="btn btn-success text-white btn-sm" wire:click="checkoutReservation({{$reservation->id}})" data-bs-toggle="modal" data-bs-target="#checkoutReservation">Checkout</a>
                                                    </td>
                                                </tr>
                                    
                                            @endif
                                        @empty

                                        <tr>
                                            <td colspan="11" class="text-center"><span class="text-center h4" >No Reservations as of now</span></td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>
    </div>
</div>

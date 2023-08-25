<div>

    <!-- Delete Amenity Modal -->
    <div wire:ignore.self class="modal fade" id="deleteReservation" tabindex="-1" aria-labelledby="deleteReservationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="deleteReservationModalLabel">Delete Amenity</h1>
            <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
    
            <form wire:submit.prevent="destroyReservation">

                <div class="modal-body">
                <h4>Are you sure you want to delete this data</h4>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">CANCEL</button>
                <button type="submit" data-bs-dismiss="modal"  class="btn btn-danger">Yes, Delete</button>
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
                <h3>History of Reservations
                    <a href="{{url('/admin/reservation/view')}}" class="btn btn-primary float-end">BACK</a>
                </h3>
                
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="completed-tab" data-bs-toggle="tab" data-bs-target="#completed-tab-pane" type="button" role="tab" aria-controls="completed-tab-pane" aria-selected="true">Completed Reservations</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="cancel-tab" data-bs-toggle="tab" data-bs-target="#cancel-tab-pane" type="button" role="tab" aria-controls="cancel-tab-pane" aria-selected="false">Cancel Reservations</button>
                    </li>
                    
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane border p-3 fade show active" id="completed-tab-pane" role="tabpanel" aria-labelledby="completed-tab" tabindex="0">  
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
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @forelse ($reservations as $reservation)
                                        
                                            @if ($reservation->status == 'complete')
                                            
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
                                                        <a href="#" class="btn btn-danger text-white  btn-sm" data-bs-toggle="modal" data-bs-target="#deleteReservation" wire:click="deleteReservation({{$reservation->id}})">Delete</a>
                                                    </td>
                                                </tr>
                                    
                                            @endif
                                        @empty

                                            <tr>
                                                <td ><span class="text-center h4">No Reservations as of now</span></td>
                                            </tr>
                                        @endforelse
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane border p-3 fade" id="cancel-tab-pane" role="tabpanel" aria-labelledby="cancel-tab" tabindex="0">
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
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($reservations as $reservation)
                                            @if ($reservation->status == 'cancel')
                                           
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
                                                        
                                                        <a href="#" class="btn btn-danger text-white  btn-sm" data-bs-toggle="modal" data-bs-target="#deleteReservation" wire:click="deleteReservation({{$reservation->id}})" >Delete</a>
                                                    </td>
                                                </tr>
                                    
                                            @endif
                                        @empty
                                            <tr>
                                                <td ><span class="text-center h4">No Reservations as of now</span></td>
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
                    
                </div>
            </div>
        </div>
    </div>

    
</div>

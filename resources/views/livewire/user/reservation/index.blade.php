<div>
    <!-- Cancel Reservation Modal -->
<div wire:ignore.self class="modal fade" id="cancelUserReservation" tabindex="-1" aria-labelledby="cancelUserReservationLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="cancelUserReservationLabel">Cancel Reservation</h1>
        <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
  
        <form wire:submit.prevent="confirmCancelUserReservation">
  
            <div class="modal-body">
            <p>Are you sure you want to Cancel this Reservation?</p>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">No</button>
            <button type="submit" data-bs-dismiss="modal"  class="btn btn-danger">Yes, Cancel</button>
            </div>
        </form>     
        
    </div>
    </div>
  </div>
  

  
  
  <div class="container mt-3">
    @if (session('message'))
    <div class="alert alert-success">{{session('message')}} </div>
    @endif

    <div class="col-lg-12 grid-margin stretch-card">
      
      <div class="card">
          <div class="card-header ">
              <h5>Hi <span class="text-success text-capitalize">{{ Auth::user()->name }} </span> this is your reservation.</h5>
              
          </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead >
                <tr class="text-nowrap">
                  
                  <th>Room Name</th>
                 
                  <th>Check-in</th>
                  <th>Check-out</th>
                  
                  <th>Status</th>
                  <th>Total Amount</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                
                  @forelse ($reservations as $userReservationItem)
                  {{-- {{dd($userReservation)}} --}}
                  <tr>
                    
                        <td>{{$userReservationItem->room->name}} </td>
                        <td>{{$userReservationItem->check_in}}/ Start time: {{$userReservationItem->time_in}} </td>
                        <td>{{$userReservationItem->check_out}}/ End time: {{$userReservationItem->time_out}} </td>
                       
                        <td>
                          @if ($userReservationItem->status == 'pending')
                            <h6><span class="badge rounded-pill bg-secondary"> Pending</span></h6>
                          @elseif ($userReservationItem->status == 'cancel')
                            <h6><span class="badge rounded-pill bg-danger"> Cancel</span></h6>
                          @elseif ($userReservationItem->status == 'confirmed')
                            <h6><span class="badge rounded-pill bg-success"> Confirmed</span></h6>
                          @elseif ($userReservationItem->status == 'checkin')
                            <h6><span class="badge rounded-pill bg-success"> Check-in</span></h6>
                          @elseif ($userReservationItem->status == 'completed')
                            <h6><span class="badge rounded-pill bg-success"> Completed</span></h6>
                          @endif
                        </td>
                        <td>{{$userReservationItem->total_price}} </td>
                        <td>
                            {{-- <a href="#" class="btn btn-primary btn-sm text-white" wire:click="editPendingReservation({{$userReservationItem->id}})" data-bs-toggle="modal" data-bs-target="#editPendingReservation">Edit</a> --}}
                            @if ($userReservationItem->status == 'pending' || $userReservationItem->status == 'confirmed' || $userReservationItem->status == 'check-in' )
                              <a href="#" class="btn btn-danger text-white  btn-sm" data-bs-toggle="modal" data-bs-target="#cancelUserReservation" wire:click="cancelUserReservation({{$userReservationItem->id}})" >Cancel</a>
                            @endif
                        </td>
                  </tr>
                  @empty
                      <tr>
                          <td colspan="6" class="text-center h4">No User Data Found </td>
                      </tr>
                  @endforelse
                
                
              </tbody>
            </table>
            <div class="my-3 ">
              {{$reservations->links()}}
            </div>
            
          </div>
        </div>
      </div>
    </div>
  
  </div>
</div>

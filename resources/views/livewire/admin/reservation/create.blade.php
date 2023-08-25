<div>
    <!-- Create Admin Reservation Modal -->
    <div wire:ignore.self class="modal fade" id="createReservationModal" tabindex="-1" aria-labelledby="createReservationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm Reservation</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form wire:submit.prevent="confirmReservation" method="POST">
                @csrf
                <div class="modal-body row g-3">
                    <h5>Reservation Details</h5>
                    <div class="col-md-6">
                        <label for="check_in" class="form-label">Check in</label>
                        <input type="date" class="form-control bg-light" readonly wire:model.defer="check_in" id="check_in" >
                        @error('check_in')<small> <span class="text-danger"> {{ $message }}</span></small> @enderror

                    </div>
                    <div class="col-md-6">
                        <label for="check_out" class="form-label">Check out</label>
                        <input type="date" class="form-control bg-light" readonly wire:model.defer="check_out" id="check_out">
                        @error('check_out')<small><span class="text-danger">{{$message}} </span></small> @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="num_guests" class="form-label">Number of Guest</label>
                        <input type="number" class="form-control bg-light" readonly wire:model.defer="num_guests" min="1">
                        @error('num_guests')<small><span class="text-danger">{{$message}} </span></small> @enderror
                    </div>
                    
                    @if ($withBreakfast)
                        <div class="col-md-6" class="mt-auto">   
                            <label for=""></label>                    
                            <p ><strong>With Breakfast: </strong>{{$withBreakfast ? 'Yes' : 'No'}} </p>
                        </div>
                    @endif
                    
                    <hr>
                    <h5>Client Information:</h5>

                    <div class="col-md-6">
                        <label for="user_id" class="form-label">User</label>
                        <input type="text" class="form-control bg-light" wire:model.defer="user_id">
                        @error('user_id')<small><span class="text-danger">{{$message}} </span></small> @enderror

                    </div>
                    <div class="col-md-6">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control bg-light" wire:model.defer="first_name">
                        @error('first_name')<small><span class="text-danger">{{$message}} </span></small> @enderror

                    </div>
                    <div class="col-md-6">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control bg-light" wire:model.defer="last_name">
                        @error('last_name')<small><span class="text-danger">{{$message}} </span></small> @enderror

                    </div>
                    <div class="col-md-12">
                        <label for="phone" class="form-label">Phone number</label>
                        <input type="number" class="form-control bg-light" wire:model.defer="phone">
                        @error('phone')<small><span class="text-danger">{{$message}} </span></small> @enderror

                    </div>
                    
                    <div class="col-md-12">
                        <label for="address" class="form-label">Address</label>
                        <textarea type="number" class="form-control bg-light" wire:model.defer="address" rows="3"></textarea>
                        @error('address')<small><span class="text-danger">{{$message}} </span></small> @enderror

                    </div>
                    <div class="d-flex justify-content-between mt-5 ">
                        <p class="text-muted fw-semibold">Total Amount</p>
                        <p class="h3 text-primary"><span class="h1">P</span> {{$totalAmount}}.00 </p>
                        @error('total_price')<small><span class="text-danger">{{$message}} </span></small> @enderror

                    </div>
                </div>
                <div class="modal-footer mt-2">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">CANCEL</button>
                    <button type="submit" data-bs-dismiss="modal"  class="btn btn-primary btn-sm">CONFIRM RESERVATION</button>
                </div>
            </form>
            
        </div>
        </div>
    </div>

    {{-- @if ($errors->any())
        <div class="alert alert-warning">
            @foreach ($errors->all() as $error)
                <div>{{$error}} </div>
            @endforeach
        </div>
    @endif --}}
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header ">
                <h3>CREATE RESERVATION
                    <a href="{{url('/admin/reservation/view')}}" class="btn btn-secondary float-end">BACK</a>
                </h3>
            </div>
            <div class="card-body">

                    <div >
                       <div class="row mb-3">
                        <h4>Reservation Details</h4>
                       </div>
                        <div class="row">

                            <div class="form-group col-md-4">
                                <label for="room_id">Room:</label>
                                <select class="form-control" wire:model="room_id">
                                    <option value="">Select Room</option>
                                    @foreach($rooms as $room)
                                        <option  value="{{ $room->id }}">{{ $room->name }} - {{$room->promo_rate ? $room->promo_rate.' (Promo Rate)' : $room->price.' (Regular Price)'}}  </option>
                                    @endforeach
                                </select>
                                @error('room_id')<small> <span class="text-danger"> {{ $message }}</span></small> @enderror
                            </div>
                        
                            <div class="form-group col-md-4">
                                <label for="check_in">Check-in Date:</label>
                                <input type="date" class="form-control" wire:model="check_in">
                                @error('check_in')<small> <span class="text-danger"> {{ $message }}</span></small> @enderror
                            </div>
                        
                            <div class="form-group col-md-4">
                                <label for="check_out">Check-out Date:</label>
                                <input type="date" class="form-control" wire:model="check_out">
                                @error('check_out')<small> <span class="text-danger"> {{ $message }}</span></small> @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="num_guests">Number of Guests:</label>
                                <input type="number" class="form-control" wire:model="num_guests">
                                @error('num_guests')<small> <span class="text-danger"> {{ $message }}</span></small> @enderror
                            </div>

                            <div class="col-md-4 "><p>Adds on:</p>
                                <input class="mt-3" type="checkbox"  wire:model="withBreakfast">
                                <label class="mt-3" for="withBreakfast">Breakfast:</label>
                            </div>
                            <div class="my-4">
                                <hr>
                            </div>
                        
                            <div class="row my-3">
                                <h4>Client Information</h4>
                            </div>
                            
                        
                            <div class="form-group col-md-4">
                                <label for="user_id">User:</label>
                                <select class="form-control" wire:model="user_id">
                                    <option value="">Select User</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('user_id')<small> <span class="text-danger"> {{ $message }}</span></small> @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" wire:model="first_name">
                                @error('first_name')<small><span class="text-danger"> {{ $message }}</span></small> @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control" wire:model="last_name">
                                @error('last_name')<small> <span class="text-danger"> {{ $message }}</span></small> @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" wire:model="phone">
                                @error('phone')<small> <span class="text-danger"> {{ $message }}</span></small> @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" wire:model="address">
                                @error('address')<small> <span class="text-danger"> {{ $message }}</span></small> @enderror
                            </div>

                            
                            @if ($totalAmount)
                                
                            <div class="mt-5">
                                <label for="total_amount">Total Amount:</label>
                                <span class="h1 text-primary float-end">P {{$totalAmount}}.00 </span>
                            </div>
                                    
                            @endif
                            <div>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#createReservationModal" class="btn btn-primary float-end btn-lg" wire:click="createReservation">Create Reservation</a>
                            </div>
                            
                            
                        </div>

                        </div>
                    
                        
                    
            </div>
        </div>
    </div>
</div>

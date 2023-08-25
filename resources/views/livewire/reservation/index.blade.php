<div>
    <!-- Reserve Modal -->
    <div wire:ignore.self class="modal fade" id="reserveRoomModal"  tabindex="-1" aria-labelledby="reserveRoomModalLabel" aria-hidden="true">
                    
        <div class="modal-dialog">
        <div class="modal-content p-2">
            
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Create your reservation</h1>
            <button type="button" class="btn-close"  wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="confirmReservation({{$totalAmount}})">
                @csrf
                <div class="modal-body row g-3">
                    @if (session('error'))
                    <div class="alert alert-danger">
                        {{session('error')}}
                    </div>
                    @endif
                    <h5>Reservation Details</h5>
                    <div class="col-md-6">
                        <label for="check_in" class="form-label">Check in</label>
                        <input type="date" class="form-control bg-light" readonly wire:model="check_in" id="check_in" >
                        @error('check_in')<small><span class="text-danger">{{$message}} </span></small> @enderror
                    </div>
                    <div class="col-6">
                        <label for="time_in" class="form-label">Time in</label>
                        <input type="time" class="form-control bg-light" readonly wire:model="time_in" id="time_in">
                        @error('time_in')<small><span class="text-danger">{{$message}} </span></small> @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="check_out" class="form-label">Check out</label>
                        <input type="date" class="form-control bg-light" readonly wire:model="check_out" id="check_out">
                        @error('check_out')<small><span class="text-danger">{{$message}} </span></small> @enderror
                    </div>
                    <div class="col-6">
                        <label for="time_out" class="form-label">Time out</label>
                        <input type="time" class="form-control bg-light" readonly wire:model="time_out" id="time_out">
                        @error('time_out')<small><span class="text-danger">{{$message}} </span></small> @enderror
                    </div>
                    
                    
                    @if ($room->no_breakfast_price > 0)
                        <div class="col-md-6" class="mt-auto">   
                            <label for=""></label>                    
                            <p ><strong>With Breakfast: </strong>{{$withBreakfast ? 'Yes' : 'No'}} </p>
                        </div>
                    @endif
                    
                    <hr>
                    <h5>Client Information:</h5>

                    <div class="col-md-6">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control bg-light" wire:model="first_name">
                        {{-- @error('first_name')<small><span class="text-danger">{{$message}} </span></small> @enderror --}}

                    </div>
                    <div class="col-md-6">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control bg-light" wire:model="last_name">
                        {{-- @error('last_name')<small><span class="text-danger">{{$message}} </span></small> @enderror --}}

                    </div>
                    <div class="col-md-12">
                        <label for="phone" class="form-label">Phone number</label>
                        <input type="tel"  class="form-control bg-light" wire:model="phone" maxlength="13">
                        @error('phone')<small><span class="text-danger">{{$message}} </span></small> @enderror 

                    </div>
                    
                    <div class="col-md-12">
                        <label for="address" class="form-label">Address</label>
                        <textarea type="number" class="form-control bg-light" wire:model="address" rows="3"></textarea>
                    </div>
                    <div class="d-flex justify-content-between mt-5">
                        <p class="text-muted fw-semibold">Total Amount</p>
                        <p class="h3 text-primary">P {{$totalAmount}}.00 </p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"  data-bs-dismiss="modal">CANCEL</button>
                    <button type="submit" data-bs-dismiss="modal"  class="btn btn-primary ">CONFIRM RESERVATION</button>
                </div>
            </form>
            
        </div>
        </div>
    </div>

    {{-- Star Rating Modal --}}
    <div wire:ignore.self class="modal fade" id="rateRoomModal"  tabindex="-1" aria-labelledby="rateRoomModalLabel" aria-hidden="true">
                    
        <div class="modal-dialog">
            <div class="modal-content p-2">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Rate this Room</h1>
                    <button type="button" class="btn-close"  wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{url('/add-rating')}}" method="POST">
                    @csrf
                    <input type="hidden" name="room_id" value="{{ $room->id }}">
                    <div class="modal-body row g-3">
                        <div class="rating-css">
                            <div class="star-icon">
                                <input type="radio" value="1" name="room_rating" checked id="rating1">
                                <label for="rating1" class="fa fa-star"></label>
                                <input type="radio" value="2" name="room_rating"  id="rating2">
                                <label for="rating2" class="fa fa-star"></label>
                                <input type="radio" value="3" name="room_rating"  id="rating3">
                                <label for="rating3" class="fa fa-star"></label>
                                <input type="radio" value="4" name="room_rating"  id="rating4">
                                <label for="rating4" class="fa fa-star"></label>
                                <input type="radio" value="5" name="room_rating"  id="rating5">
                                <label for="rating5" class="fa fa-star"></label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal"  data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" data-bs-dismiss="modal"  class="btn btn-primary ">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="section mt-2">
        
        <div class="container-xl">
            @if (session('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                </div>
            @endif
            @if (session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{session('error')}}
                </div>
            @endif
            
            
            <div class="row justify-content-center  ">

                <!-- RESORTS -->
                <div class="col-md-8">
                    <div class="container-">
                        <div class="gallery-layout1">
                            @if ($room->roomImages)
                                @foreach ($room->roomImages as $image)
                                    <div class="rounded ">
                                        <img src="{{asset($image->image)}}" alt="" class="img-fluid w-100 h-100">
                                    </div>
                                @endforeach
                            @else
                                <div class="row">No image Has Been Found</div>
                            @endif      
                        </div>
                    </div>
                    <div class="text-center text-md-start mt-5">
                        <h2>{{$room->name}} </h2>
                        <p >{{$room->category->name}} </p>
                        @php
                            $rate_value = number_format($rating_value) 
                        @endphp 
                        <div class="rating">
                            @for ($i = 1; $i <= $rate_value; $i++)
                                <i class="fa fa-star checked"></i>
                            @endfor
                            @for ($j = $rate_value+1; $j <= 5; $j++)
                                <i class="fa fa-star"></i>
                            @endfor
                            <span class="text-muted">
                                @if ($ratings->count() > 0)
                                    {{ $ratings->count() }} Ratings
                                @else
                                    No rating                                  
                                @endif
                            </span>
                            
                        </div>
                        <p class="mt-4">{{$room->description}} </p>

                        <p class="text-muted"></p>
                    </div>
                    <div class="row mt-5 mx-2">
                        
                            @foreach ($room->amenities as $amenityItem)
                                <ul class=" list-ticked col-md-4">
                                        <li class="">{{$amenityItem->name}} </li>
                                </ul>    
                            @endforeach
                        
                    </div>
                    
                    {{-- Button trigger modal for rating this room --}}
                    <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#rateRoomModal">Rate this room</button>

                    <div class="comment-area my-4">
                        <div class="card card-body">
                            <h6 class="card-title">Leave a comment</h6>
                            <form action="{{ url('/comment') }}" method="POST">
                                @csrf
                                <input type="hidden" name="room_id" value="{{ $room_id }}">

                                <textarea name="comment_body" class="form-control" id=""  rows="3"></textarea>
                                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                            </form>
                        </div>
                    
                        @forelse ($room->comments as $comment)
                            <div class="card card-body shadow-sm mt-3">
                                <div class="detail-area">
                                    <h6 class="user-name mb-1">
                                        @if ($comment->user)
                                            {{$comment->user->name}}
                                        @endif
                                        <small class="ms-3 text-primary"> Commented on: {{ $comment->created_at->format('d-m-Y') }}</small>
                                    </h6>
                                    <p class="user-comment mb-1">
                                        {!! $comment->comment_body !!}
                                    </p>
                                </div>
                                @if (Auth::check() && Auth::id() == $comment->user_id)
                                <div class="d-flex justify-content-end">
                                    {{-- <a href="" class="btn btn-danger btn-sm me-2">Delete</a> --}}
                                    <a href="{{url('/comment/'.$comment->id.'/destroy')}} " onclick="return confirm('Are you sure you want to delete this comment?')" class="btn btn-danger btn-sm text-whit " >Delete</a>
                                </div>
                                    
                                @endif
                            </div>
                        @empty
                        <div class="card card-body shadow-sm mt-3">
                            <h6>No Comments yet</h6>
                        </div>
                        @endforelse
                        
                    </div>
                    
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card p-2">
                        <div class="card-header d-flex justify-content-between bg-transparent">
                            @if ($room->promo_rate != null )
                            
                            <h5 class="card-title"><span class="h3 text-primary">P {{$room->promo_rate}}</span>/night</h5>
                            <span><del class="h6 text-danger">{{$room->price}} </del></span>
                            @else
                            
                            <h5 class="card-title"><span class="h3 text-primary">P {{$room->price}}</span>/night</h5>   
                            @endif
                            
                        </div>
                        <div class="card-body">
                        
                            
                            <div class="row">
                                <div class="col-6">
                                    <label for="check_in" class="form-label">Check in</label>
                                    <input type="date" class="form-control bg-light" wire:model="check_in" id="check_in">
                                    @error('check_in')<small><span class="text-danger">{{$message}} </span></small> @enderror
                                </div>
                                <div class="col-6">
                                    <label for="time_in" class="form-label">Time in</label>
                                    <input type="time" class="form-control bg-light" wire:model="time_in" id="time_in">
                                    @error('time_in')<small><span class="text-danger">{{$message}} </span></small> @enderror
                                </div>
                                <div class="col-6">
                                    <label for="check_out" class="form-label">Check out</label>
                                    <input type="date" class="form-control bg-light" wire:model="check_out" id="check_out">
                                    @error('check_out')<small><span class="text-danger">{{$message}} </span></small> @enderror
                                </div>
                                <div class="col-6">
                                    <label for="time_out" class="form-label">Time out</label>
                                    <input type="time" class="form-control bg-light" wire:model="time_out" id="time_out">
                                    @error('time_out')<small><span class="text-danger">{{$message}} </span></small> @enderror
                                </div>

                                <div class=""><hr></div>
                                
                                {{-- Pricing --}}
                                @if ($room->no_breakfast_price > 0)
                                    <div class="col-12 mt-2">
                                        <label for="price" class="form-label d-block">Adds on: </label>
                                        {{-- If No breakfast has filled up it will show --}}
                                           
                                        <input type="checkbox" class="form-check-input me-2" id="withBreakfast" wire:model="withBreakfast">
                                        <label for="" class="form-check-label"><span class="float-start">With Breakfast</span> </label><span class="float-end fw-bold">200</span>
                                    </div>
                                    <label class="form-label bold">Pricing: </label>
                                    <div class="col-md-12 pt-2 bg-light">
                                        <ul class="list-arrow">
                                            <li>Original price <span class="float-end"><del class="text-danger">{{$room->price}}</del></span></li>
                                            <li>Promo rate <span class="float-end text-success">{{$room->promo_rate}} </span></li>
                                            <li>{{$totalNights}} Night/s <span class="float-end text-success">{{$subTotal}} </span></li>
                                        </ul>
                                        
                                    </div>
                                    <div class="d-flex justify-content-between mt-5">
                                        <p class="text-muted fw-semibold">Total Amount</p>
                                        <p class="h4 text-primary">P {{$totalAmount}}.00 </p>
                                          
                                    </div>                                  
     
                                @else
                                <label class="form-label bold">Pricing: </label>
                                <div class="col-md-12 pt-2 bg-light">
                                    <ul class="list-arrow">
                                        @if ($room->promo_rate != null )
                                            <li>Original price <span class="float-end"><del class="text-danger">{{$room->price}}</del></span></li>
                                            <li>Promo rate <span class="float-end text-success">{{$room->promo_rate}} </span></li>                                             
                                        @endif

                                        <li>{{$totalNights}} Night/s <span class="float-end text-success">{{$subTotal}} </span></li>
                                    </ul>
                                    
                                </div>
                                <div class="d-flex justify-content-between mt-5">
                                    <p class="text-muted fw-semibold">Total Amount</p>
                                    <p class="h4 text-primary">P {{$totalAmount}}.00 </p>
                                </div>
                                                              
                                @endif

                                <button type="button" class="btn btn-warning btn-lg" wire:click.prevent="roomReservation({{$totalAmount}})" data-bs-toggle="modal" data-bs-target="#reserveRoomModal">Reserve now</button>

                            </div>
  
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    
    
    <script>
        document.addEventListener('livewire:load', function() {

            Livewire.on('closeModalOnError', function() {
                $('#reserveRoomModal').modal('hide');
            })
        })
    </script>
</div>


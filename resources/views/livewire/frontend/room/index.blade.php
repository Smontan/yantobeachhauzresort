<div>
    <div class="row text-center my-4">
        <h3>Yanto Beach Hauz Rooms</h3>
    </div>
    <div class="row justify-content-center">
        

        <div class="col-12 my-4">
            <div class="card mb-4">
              <div class="card-header pb-0 p-3">
                <div class="row justify-content-center">
                    <div class="col col-md-3 d-flex justify-content-center">
                        <div class="dropdown ">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Room Type
                            </button>
                            <div class="dropdown-menu p-4">
                                @forelse ($category as $categoryItem)
                                    <label for="" class="d-block mb-1 dropdown-item" >
                                        <input type="checkbox" wire:model="selectedCategories" value=" {{$categoryItem->id}}"> {{$categoryItem->name}}
                                    </label>
                                @empty
                                    <h4>No Room Type has been added</h4>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-3 d-flex justify-content-center">
                        <div class="dropdown ">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Price order
                            </button>
                            <div class="dropdown-menu p-4">
                                <label for="priceFilter">Sort by Price</label>
                                    <select wire:model="priceOrder" id="priceFilter">
                                        <option value="">Select Order</option>
                                        <option value="asc">Low to High</option>
                                        <option value="desc">High to Low</option>
                                    </select>
                            </div>
                        </div>
                    </div>
                    
                </div>             
             </div>
            <div class="card-body p-3">
                <div class="row gy-5 gx-5">
                @if (!is_null($rooms))

                    @forelse($rooms as $room)
                        <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                            <div class="card card-blog card-plain h-100" >
                                <div class="position-relative">
                                    <a class="d-block shadow-xl border-radius-xl" >
                                        @if ($room->roomImages->count() > 0)
                                            <img src="{{asset($room->roomImages[0]->image)}}" class="card-img-top shadow border-radius-xl  "  alt="{{ $room->name }}" >
                                        @endif
                                    </a>
                                </div>
                                <div class="card-body px-1 pb-0">
                                    <p class="text-gradient text-dark mb-2 text-sm">{{ $room->category->name }}</p>
                                    <a href="{{url('rooms/reserved_room/'.$room->id)}}">
                                    <h5 class="text-truncate">
                                        {{ $room->name }}
                                    </h5>
                                    </a>
                                    
                                    <div class="d-flex align-items-center justify-content-between">
                                        <a href="{{url('rooms/reserved_room/'.$room->id)}}" class="btn btn-outline-primary btn-sm mb-0">View Room</a>
                                        <div id="price" class="text-primary align-self-center">P {{ $room->price }} </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="text-center">
                            <h4>No Availble Rooms for this category</h4>
                        </div>
                    @endforelse
                @endif
                </div>
            </div>
            </div>
        </div>
        
        {{-- <div class="row justify-content-center">
            <h4>Plot rooms by date</h4>
            <div class="col-12 mt-4">
                <div class="card mb-4">
                  <div class="card-body p-3">

                    <livewire:livewire-column-chart
                        :column-chart-model="$bookingsChart"
                    />
                  </div>
                </div>
            </div>

        </div> --}}
    </div>
</div>

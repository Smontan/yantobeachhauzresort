<div>
    @include('livewire.admin.amenity.modal-form')

      @if (session('message'))
      <h5 class="alert alert-success">
        {{session('message')}}
      </h5>
      @endif
      <div class="col-lg-12 grid-margin stretch-card">
        
          <div class="card">
              <div class="card-header ">
                  <h3>Amenity
                      <a href="#" data-bs-toggle="modal" data-bs-target="#addAmenityModal" class="btn btn-primary float-end">ADD AMENITY</a>
                  </h3>
                  
              </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @forelse ($amenities as $amenity)
                      
                      <tr>
                          <td> {{$amenity->id}} </td>
                          <td> {{$amenity->name}} </td>
                          <td> {{$amenity->description}} </td>
                          <td> {{$amenity->status == '1' ? 'Hidden':'Visible'}} </td>
                          <td> 
                                  <a href="#" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#updateAmenityModal" wire:click="editAmenity({{$amenity->id}})" >EDIT</a>
                                  <a href="#" class="btn btn-danger btn-sm" wire:click="deleteAmenity({{$amenity->id}})" data-bs-toggle="modal" data-bs-target="#deleteAmenityModal">DELETE</a>
                        
                          </td>
                        </tr>
                        @empty
                          <tr>
                              <td colspan="5" >
                                <h4 class="text-center">No amenity found</h4>
                              </td>
                          </tr>

                      @endforelse
                    
                    
                  </tbody>
                </table>
                <div class="my-3 ">
                  {{$amenities->links()}}
                </div>
                
              </div>
            </div>
          </div>
      </div>
  </div>
  

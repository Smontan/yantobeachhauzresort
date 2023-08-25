@extends('layouts.admin')

@section('content')

    @if (session('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
    @endif
    
 
<div class="col-lg-12 grid-margin stretch-card">
    
  
    <div class="card">
        <div class="card-header ">
            <h3>Room
                <a href="{{url('/admin/room/create')}}" class="btn btn-primary float-end">ADD ROOM</a>
            </h3>
        </div>
        <div class="card-body">
            <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr >
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Amenities</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($rooms as $room)
  
                        
                        <tr>
                            <td> {{$room->id}} </td>
                            <td> {{$room->name}} </td>
                            <td> 
                                @if ($room->category)
                                    {{$room->category->name}}
                                    @else

                                    <p>No Category</p>
                                @endif
                            </td>                
                            
                            <td><span class="d-inline-block text-truncate" style="max-width: 150px">
                              {{$room->description}}</span>
                            </td>
                            <td>
                              {{$room->price}}
                            </td>
                            <td>
                              <span class="d-inline-block text-truncate" style="max-width: 150px">
                              @foreach ($room->amenities as $amenity)
                              <span>{{$amenity->name}}, </span>
                              @endforeach
                              </span>
                            </td>                         
                            
                            <td>
                              @if ($room->status == 1)
                              <div class="btn btn-rounded btn-light btn-sm">Hidden </div>
                              @else
                              <div class="btn btn-rounded btn-warning text-white btn-sm">Visible</div>
                              @endif
                              
                               {{-- {{$room->status == '1' ? 'Hidden':'Visible'}} </td> --}}
                            <td> 
                                    <a href="{{url('admin/room/'.$room->id.'/edit')}} " class="btn btn-secondary btn-sm"" >EDIT</a>
                                    <a href="{{url('admin/room/'.$room->id.'/delete')}} " onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-danger btn-sm text-white" >DELETE</a>
                                    
                            </td>
                          </tr>
                          @empty
                          <tr>
                              <td colspan="8" >
                                <h4 class="text-center">No room found</h4>
                              </td>
                          </tr>
  
                        @endforelse
                      
                      
                    </tbody>
                  </table>
                  <div class="my-3 ">
                    {{-- {{$rooms->links()}} --}}
                  </div>
                  
                </div>
              </div>
        </div>
    </div>
</div>
@endsection


@extends('layouts.admin')

@section('content')
@if (session('message'))
    <div class="alert alert-success">
        <h5>{{session('message')}} </h5>
    </div>

@endif
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-header ">
            <h3>Update Room
                <a href="{{url('/admin/room')}}" class="btn btn-primary float-end">BACK</a>
            </h3>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-warning">
                    @foreach ($errors->all() as $error)
                        <div>{{$error}} </div>
                    @endforeach
                </div>
            @endif

            <form action=" {{url('admin/room/'.$room->id)}} " method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="true">Room Details</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="amenity-tab" data-bs-toggle="tab" data-bs-target="#amenity-tab-pane" type="button" role="tab" aria-controls="amenity-tab-pane" aria-selected="false">Room Amenities</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">Room Images</button>
                    </li>
                  </ul>
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane border p-3 fade show active" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">  
                        <div class="row mt-4" >
                            <div class="col-md-4 mb-3">
                                <label class="mb-3">Category</label>
                                <select name="category_id" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}" {{$category->id == $room->category_id ? 'selected' : ''}}>{{$category->name}} </option>    
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-8 mb-3">
                                <label class="mb-2" for="Name">Room Name</label>
                                <input type="text" name="name" value="{{$room->name}}" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="mb-2" for="Name">Description</label>
                                <textarea class="form-control" name="description" rows="3" > {{$room->description}}</textarea>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="mb-2" for="Price">Price per Night</label>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">P</span>
                                        <input type="number" class=" form-control" name="price" rows="3" min="0" step="0.01" value="{{$room->price}}">
            
                                    </div>
                                @error('price') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="mb-2" for="promo_rate">Promo rate</label>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">P</span>
                                        <input type="number" class=" form-control" name="promo_rate" rows="3" min="0" step="0.01" value="{{$room->promo_rate}}">
                                    </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="mb-2" for="no_breakfast_price">No breakfast price</label>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">P</span>
                                        <input type="number" class=" form-control" name="no_breakfast_price" rows="3" min="0" step="0.01" value="{{$room->no_breakfast_price}}">
                                    </div>
                            </div>
                            
                            <div class="col-md-3 mb-3">
                                <label class="mb-2" for="max_guests">Max Guests </label> <br>
                                <input type="number" class=" me-2 form-control" name="max_guests" min="1" value="{{$room->max_guests}}">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="mb-2" for="num_beds">Number of beds</label> <br>
                                <input class=" me-2 form-control" type="number"  name="num_beds" min="1" value="{{$room->num_beds}}" >
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="mb-2" for="status">Status: </label> <br>
                                <input class="mt-3 me-2" type="checkbox"  name="status" {{$room->status == '1' ? 'checked':''}}>Not available
                            </div>
                            
                        </div>
                    </div>
                    <div class="tab-pane border p-3 fade" id="amenity-tab-pane" role="tabpanel" aria-labelledby="amenity-tab" tabindex="0">
                      <div class="row mt-4">
                        <div class=" mb-3">
                            <label class="mb-3" for="amenity[]">Amenity: </label> <br>
                                <div class="row">
                                    
                                    @foreach ($amenities as $amenity)
                                        <div class="col-md-4 mb-4">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox"class="me-2"  name="amenities[]" class="custom-control-input" value="{{$amenity->id}}" id="amenity{{$amenity->id}}" {{in_array($amenity->id, $room->amenities->pluck('id')->toArray()) ? 'checked':''}}>
                                                <label for="amenity{{$amenity->id}}" class="custom-control-label">{{$amenity->name}}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>                 
                        </div>
                        
                      </div>
                    </div>
                    <div class="tab-pane border p-3 fade" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                        <div class="row">
                            @if ($room->roomImages)
                                <div class="row">
                                    <div class="row mt-4">
                                        <div class="col-md-12 mb-3 form-group">
                                            <label for="images">Upload Room Images</label>
                                            <input type="file" name="images[]" id="images" class="form-control" multiple>
                                        </div>
                                    </div>
                                    @foreach ($room->roomImages as $image)
                                        <div class="col-md-2">
                                            <img src="{{asset($image->image)}}" width="60px" height="60px" alt="img" class="me-4 border">
                                            <a href="{{url('admin/room-image/'.$image->id.'/delete')}} " class="mt-1 d-block text-warning">Remove</a>
                                        </div>
                                    @endforeach
                                </div>
                                @else 
                                    <h5>No image has been uploaded</h5>

                                    <div class="row mt-4">
                                        <div class="col-md-12 mb-3 form-group">
                                            <label for="images">Upload Room Images</label>
                                            <input type="file" name="images[]" id="images" class="form-control" multiple>
                                        </div>
                                    </div>
                            @endif
                        </div>
                    </div>
                  </div>
                  <div class="mt-3">
                    <button type="submit" class="btn btn-primary float-end">UPDATE</button>
                  </div>
            </form>
           
        </div>
    </div>
</div>
@endsection



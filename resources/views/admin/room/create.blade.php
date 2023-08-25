@extends('layouts.admin')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-header ">
            <h3>Add Room
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

            <form action=" {{url('admin/room')}} " method="POST" enctype="multipart/form-data">
                @csrf
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
                                <label class="mb-3">Room Type(Category)</label>
                                <select name="category_id" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}} ">{{$category->name}} </option>    
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-8 mb-3">
                                <label class="mb-2" for="Name">Room Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="mb-2" for="Name">Description</label>
                                <textarea class="form-control" name="description" rows="3" ></textarea>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="mb-2" for="Price">Price per Night</label>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">P</span>
                                        <input type="number" class=" form-control" name="price" rows="3" min="0" step="0.01">

                                    </div>
                                @error('price') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="mb-2" for="promo_rate">Promo rate</label>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">P</span>
                                        <input type="number" class=" form-control" name="promo_rate" rows="3" min="0" step="0.01">
                                    </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="mb-2" for="no_breakfast_price">No breakfast price</label>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">P</span>
                                        <input type="number" class=" form-control" name="no_breakfast_price" rows="3" min="0" step="0.01" >
                                    </div>
                            </div>
                            
                            <div class="col-md-3 mb-3">
                                <label class="mb-2" for="max_guests">Max Guests </label> <br>
                                <input type="number" class=" me-2 form-control" name="max_guests" min="1">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="mb-2" for="num_beds">Number of beds</label> <br>
                                <input class=" me-2 form-control" type="number"  name="num_beds" min="1">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="mb-2" for="status">Status: </label> <br>
                                <input class="mt-3 me-2" type="checkbox"  name="status">Not available
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
                                                <input type="checkbox"class="me-2"  name="amenities[]" class="custom-control-input" value="{{$amenity->id}}" id="ameity{{$amenity->id}}" >
                                                <label for="amenity{{$amenity->id}}" class="custom-control-label">{{$amenity->name}}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>                 
                        </div>
                        
                      </div>
                    </div>
                    <div class="tab-pane border p-3 fade" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                        <div class="row mt-4">
                            <div class="col-md-12 mb-3 form-group">
                                <label for="images">Upload Room Images</label>
                                <input type="file" name="images[]" id="images" class="form-control" multiple>
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="mt-3">
                    <button type="submit" class="btn btn-primary float-end">Submit</button>
                  </div>
            </form>
           
        </div>
    </div>
</div>
@endsection
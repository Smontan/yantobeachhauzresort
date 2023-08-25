@extends('layouts.admin')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-header ">
            <h3>EDIT PROMOTION
                <a href="{{url('/admin/promotion')}}" class="btn btn-secondary float-end">BACK</a>
            </h3>
        </div>
      <div class="card-body">
        <form action=" {{url('/admin/promotion/'.$promotion->id)}} " method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="title">Title</label>
                    <input type="text" name="title" value="{{$promotion->title}} " class="form-control">
                    @error('title') <small class="text-danger">{{$message}}</small> @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" rows="3" >{{$promotion->description}}</textarea>
                    @error('description') <small class="text-danger">{{$message}}</small> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="Image">Image</label>
                    <input type="file" class="form-control" name="image" rows="3" >
                    <img src="{{asset('uploads/promotion/'.$promotion->image)}} " width="60px" height="60px" alt="">
                    @error('image') <small class="text-danger">{{$message}}</small> @enderror
                </div>
                <div class="col-md-3 mb-3 form-group">
                    <label  for="start_date">Start time: </label> <br>
                    <input class="mt-3 me-2" type="date"  class="form-control " value="{{$promotion->start_date}}" name="start_date">
                    @error('start_date')
                        <small class="text-danger">{{$message}}</small> 
                    @enderror
                </div>
                <div class="col-md-3 mb-3 form-group">
                    <label  for="end_date">End time: </label> <br>
                    <input class="mt-3 me-2" type="date"  class="form-control " value="{{$promotion->end_date}}" name="end_date">
                    @error('end_date')
                        <small class="text-danger">{{$message}}</small> 
                    @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <button type="submit" class="btn btn-primary float-end">UPDATE</button>
                </div>
            </div>
            
        </form>
      </div>
    </div>
</div>
@endsection
@extends('layouts.admin')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-header ">
            <h3>ADD WEB PAGE
                <a href="{{url('/admin/web_page')}}" class="btn btn-secondary float-end">BACK</a>
            </h3>
        </div>
      <div class="card-body">
        <form action=" {{url('/admin/web_page')}} " method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row ">
                <div class="col-md-12 mb-3">
                    <label for="Name">Name</label>
                    <input type="text" name="name" class="form-control">
                    @error('name') <small class="text-danger">{{$message}}</small> @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label for="Title">Title</label>
                    <input type="text" name="title" class="form-control">
                    @error('title') <small class="text-danger">{{$message}}</small> @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label for="Sub-Title">Sub-title</label>
                    <input type="text" name="sub_title" class="form-control">
                    @error('sub_title') <small class="text-danger">{{$message}}</small> @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label for="Description">Description</label>
                    <textarea class="form-control" name="description" rows="3" ></textarea>
                    @error('description') <small class="text-danger">{{$message}}</small> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" name="image" rows="3" >
                    @error('image') <small class="text-danger">{{$message}}</small> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="Status">Status: </label> <br>
                    <input class="mt-3 me-2" type="checkbox"  name="status">Hidden
                </div>
                <div class="col-md-12 mb-3">
                    <button type="submit" class="btn btn-primary float-end">SAVE</button>
                </div>
            </div>
            
        </form>
      </div>
    </div>
</div>
@endsection
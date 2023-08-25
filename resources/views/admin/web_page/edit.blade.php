    @extends('layouts.admin')

    @section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header ">
                <h3>EDIT WEB PAGE
                    <a href="{{url('/admin/web_page/'.$web_page->id)}}" class="btn btn-secondary float-end">BACK</a>
                </h3>
            </div>
        <div class="card-body">
            <form action=" {{url('/admin/web_page/'.$web_page->id)}} " method="POST" enctype="multipart/form-data">
            @csrf
                @method('PUT')
                <div class="row ">
                    <div class="col-md-12 mb-3">
                        <label for="Name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{$web_page->name}}" >
                        @error('name') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="Title">Title</label>
                        <input type="text" name="title" class="form-control" value="{{$web_page->title}}">
                        @error('title') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="Sub-Title">Sub-title</label>
                        <input type="text" name="sub_title" class="form-control" value="{{$web_page->sub_title}}">
                        @error('sub_title') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="Description">Description</label>
                        <textarea class="form-control" name="description" rows="3" >{{$web_page->description}} </textarea>
                        @error('description') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="Image">Image</label>
                        <input type="file" class="form-control" name="image" rows="3" >
                        <img src="{{asset('uploads/web_page/'.$web_page->image)}}"  style="width:60px; height:60px" alt="image">
                        @error('image') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="Status">Status: </label> <br>
                        <input class="mt-3 me-2" type="checkbox" {{$web_page->status == '1' ? 'checked':''}}  name="status">Hidden
                    </div>
                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary float-end">Update</button>
                    </div>
                </div>
                
            </form>
        </div>
        </div>
    </div>
    @endsection
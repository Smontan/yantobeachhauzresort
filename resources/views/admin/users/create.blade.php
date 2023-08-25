@extends('layouts.admin')

@section('title', 'Create New User')
@section('content')

    
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-header ">
            <h3>ADD USER
                <a href="{{url('/admin/users')}}" class="btn btn-secondary float-end">BACK</a>
            </h3>
        </div>
      <div class="card-body">
        <form action="{{url('/admin/users')}}" method="POST" >
            @csrf
            <div class="row">
                <div class="col-md-6 form-group mb-3">
                    <label for="Name">Name</label>
                    <input type="text" name="name" class="form-control">
                    @error('name') <small class="text-danger">{{$message}}</small> @enderror
                </div>
                <div class="col-md-6 form-group mb-3">
                    <label for="Name">Email</label>
                    <input type="text" name="email" class="form-control">
                    @error('email') <small class="text-danger">{{$message}}</small> @enderror
                </div>
                <div class="col-md-6 form-group mb-3">
                    <label for="Name">Password</label>
                    <input type="text" name="password" class="form-control">
                    @error('password') <small class="text-danger">{{$message}}</small> @enderror
                </div>
                <div class="col-md-6 form-group mb-3">
                    <label for="Name">Role as</label>
                    <select name="role_as" class="form-control">
                        <option value="">Select Role</option>
                        <option value="1">Admin</option>
                        <option value="0">User</option>
                    </select>
                    @error('role_as') <small class="text-danger">{{$message}}</small> @enderror
                </div>

                <div class="col-md-12  mb-3">
                    <button type="submit" class="btn btn-primary float-end">SAVE</button>
                </div>
            </div>
            
        </form>
      </div>
    </div>
</div>
@endsection
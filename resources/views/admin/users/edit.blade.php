@extends('layouts.admin')

@section('content')

    
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-header ">
            <h3>EDIT USER
                <a href="{{url('/admin/users')}}" class="btn btn-secondary float-end">BACK</a>
            </h3>
        </div>
      <div class="card-body">
        <form action="{{url('/admin/users/'.$user->id)}}" method="POST" >
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 form-group mb-3">
                    <label for="Name">Name</label>
                    <input  type="text" name="name" value="{{$user->name}} " class="form-control bg-light">
                    @error('name') <small class="text-danger">{{$message}}</small> @enderror
                </div>
                <div class="col-md-6 form-group mb-3">
                    <label for="Name">Email</label>
                    <input  type="text" name="email" value="{{$user->email}} " class="form-control bg-light" readonly>
                    @error('email') <small class="text-danger">{{$message}}</small> @enderror
                </div>
                <div class="col-md-6 form-group mb-3">
                    <label for="Name">Password</label>
                    <input  type="text" name="password"  class="form-control bg-light">
                    @error('password') <small class="text-danger">{{$message}}</small> @enderror
                </div>
                <div class="col-md-6 form-group mb-3">
                    <label for="Name">Role as</label>
                    <select name="role_as"  class="form-control bg-light">
                        <option value="">Select Role</option>
                        <option value="1" {{$user->role_as == 1 ? 'selected':''}}>Admin</option>
                        <option value="0" {{$user->role_as == 0 ? 'selected':''}}>User</option>
                    </select>
                    @error('role_as') <small class="text-danger">{{$message}}</small> @enderror
                </div>
                <div class="col-md-6 form-group mb-3">
                    <label for="cancellation_count">Cancellation Count</label>
                    <input type="number" name="cancellation_count" placeholder="{{$user->cancellation_count}}" min="0" max="3" class="form-control bg-light">
                    @error('cancellation_count') <small class="text-danger">{{$message}}</small> @enderror
                </div>

                <div class="col-md-12  mb-3">
                    <button type="submit" class="btn btn-primary float-end">UPDATE</button>
                </div>
            </div>
            
        </form>
      </div>
    </div>
</div>
    
@endsection
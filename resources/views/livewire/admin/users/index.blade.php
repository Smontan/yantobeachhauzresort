<div>
    <!--Delete Modal -->
  <div wire:ignore.self class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="DeleteCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"> Delete User</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="destroyUser" method="POST">
          @csrf
          <div class="modal-body">
            <h6>Are you sure you want to delete this User?</h6>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CANCEL</button>
            <button type="submit" data-bs-dismiss="modal"  class="btn btn-danger">DELETE</button>
          </div>
        </form>
        
      </div>
    </div>
  </div>


  
  @if (session('message'))
  <div class="alert alert-success">{{session('message')}} </div>
  @endif
  <div class="col-lg-12 grid-margin stretch-card">
      
      <div class="card">
          <div class="card-header ">
              <h3>USERS LIST
                  <a href="{{url('/admin/users/create')}}" class="btn btn-secondary float-end">ADD USER</a>
              </h3>
              
          </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead >
                <tr class="text-nowrap">
                  <th>ID</th>
                  <th>NAME</th>
                  <th>EMAIL</th>
                  <th>PASSWORD</th>
                  <th>ROLE</th>
                  <th>CANCELLATION</th>
                  <th>ACTIONS</th>
                </tr>
              </thead>
              <tbody>
                
                  @forelse ($users as $user)
                  <tr>
                      <td>{{$user->id}} </td>
                      <td>{{$user->name}} </td>
                      <td>{{$user->email}} </td>
                      <td><span class="d-inline-block text-truncate" style="max-width: 150px">{{$user->password}}</span></td>
                      <td>
                        @if ($user->role_as == 1)
                        <div class="btn btn-rounded btn-info btn-sm"> Admin</div>
                        @else
                        <div class="btn btn-rounded btn-light btn-sm"> User</div>
                        @endif
                      </td>
                      <td>
                        {{$user->cancellation_count}} 
                      </td>
                      <td>
                          <a href="{{url('admin/users/'.$user->id.'/edit')}} " class="btn btn-primary btn-sm text-white" >EDIT</a>    
                          <a href="#" data-bs-target="#deleteUserModal" data-bs-toggle="modal" wire:click="deleteUser({{$user->id}})"  class="btn btn-danger btn-sm text-white" >DELETE</a>    
                      </td>
                  </tr>
                  @empty
                      <tr>
                          <td colspan="6" class="text-center h4">No User Data Found </td>
                      </tr>
                  @endforelse
                
                
              </tbody>
            </table>
            <div class="my-3 ">
              {{$users->links()}}
            </div>
            
          </div>
        </div>
      </div>
  </div>

</div>

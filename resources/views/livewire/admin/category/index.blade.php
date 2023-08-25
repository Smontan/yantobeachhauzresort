<div>
  <!-- Modal -->
  <div wire:ignore.self class="modal fade" id="deleteCategoryModal" tabindex="-1" aria-labelledby="DeleteCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Category Delete</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="destroyCategory">

          <div class="modal-body">
            <h6>Are you sure you want to delete this category?</h6>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" data-bs-dismiss="modal"  class="btn btn-danger">DELETE</button>
          </div>
        </form>
        
      </div>
    </div>
  </div>

    @if (session('message'))
    <h4 class="alert alert-success">
      {{session('message')}}
    </h4>
    @endif
    <div class="col-lg-12 grid-margin stretch-card">
      
        <div class="card">
            <div class="card-header ">
                <h3>CATEGORY
                    <a href="{{url('/admin/category/create')}}" class="btn btn-primary float-end">ADD CATEGORY</a>
                </h3>
                
            </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped">
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
                    @forelse ($categories as $category)
                      <tr>
                        <td> {{$category->id}} </td>
                        <td> {{$category->name}} </td>
                        <td> {{$category->description}}</td>
                        <td> 
                          {{-- {{$category->status == '1' ? 'Hidden':'Visible'}}  --}}
                          @if ($category->status == 1)
                            <div class="btn btn-rounded btn-light btn-sm"> Hidden</div>
                          @else
                            <div class="btn btn-rounded btn-info btn-sm"> Visible</div>
                          @endif
                        </td>
                        <td> 
                                <a href=" {{url('/admin/category/'.$category->id.'/edit')}} " class="btn btn-secondary btn-sm" >EDIT</a>
                                <a href="#" class="btn btn-danger btn-sm" wire:click="deleteCategory({{$category->id}})" data-bs-toggle="modal" data-bs-target="#deleteCategoryModal">DELETE</a>
                                <!-- Button trigger modal -->
                                
                        </td>
                      </tr>
                      @empty
                        <tr>
                            <td colspan="5" >
                              <h4 class="text-center">No Category found</h4>
                            </td>
                        </tr>
                    @endforelse
                  
                  
                </tbody>
              </table>
              <div class="my-3 ">
                {{$categories->links()}}
              </div>
              
            </div>
          </div>
        </div>
    </div>
</div>

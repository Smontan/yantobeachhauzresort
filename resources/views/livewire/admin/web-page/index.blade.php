<div>
    <div>
        <!-- Modal -->
        <div wire:ignore.self class="modal fade" id="deleteWebPageModal" tabindex="-1" aria-labelledby="DeleteCategoryModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Web Page Delete</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form wire:submit.prevent="destroyWebPage">
      
                <div class="modal-body">
                  <h6>Are you sure you want to delete this web page?</h6>
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
                      <h3>WEB PAGE
                          <a href="{{url('/admin/web_page/create')}}" class="btn btn-primary float-end">ADD WEB PAGE</a>
                      </h3>
                      
                  </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Title</th>
                          <th>Sub-title</th>
                          <th>Description</th>
                          <th>Image</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          @forelse ($web_pages as $web_page)
                            <tr>
                                <td> {{$web_page->id}} </td>
                                <td> {{$web_page->name}} </td>
                                <td> {{$web_page->title}} </td>
                                <td> {{$web_page->sub_title}} </td>
                                <td> {{$web_page->description}} </td>
                                <td>
                                  <img src="{{asset('uploads/web_page/'.$web_page->image)}}" style="width: 60px; height: 60px" alt="web_page">
                                </td>
                                <td> {{$web_page->status == '1' ? 'Hidden':'Visible'}} </td>
                                <td> 
                                  <a href=" {{url('/admin/web_page/'.$web_page->id.'/edit')}} " class="btn btn-secondary btn-sm" >EDIT</a>
                                  <a href="#" class="btn btn-danger btn-sm" wire:click="deleteWebPage({{$web_page->id}})" data-bs-toggle="modal" data-bs-target="#deleteWebPageModal">DELETE</a>
                                </td>
                              </tr>
                              @empty
                              <tr>
                                  <td colspan="8" >
                                    <h4 class="text-center">No Web page found</h4>
                                  </td>
                              </tr>

                          @endforelse
                        
                        
                      </tbody>
                    </table>
                    
                    
                  </div>
                </div>
              </div>
          </div>
      </div>
      
</div>

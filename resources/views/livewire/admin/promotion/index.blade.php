<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="deletePromotionModal" tabindex="-1" aria-labelledby="DeletePromotionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Promotion Delete</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="destroyPromotion">

            <div class="modal-body">
                <h6>Are you sure you want to delete this promotion?</h6>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" data-bs-dismiss="modal"  class="btn btn-danger">DELETE</button>
            </div>
            </form>
            
        </div>
        </div>
    </div>

    <div class="col-lg-12 grid-margin stretch-card">
      
        <div class="card">
            <div class="card-header ">
                <h3>Promotions
                    <a href="{{url('/admin/promotion/create')}}" class="btn btn-primary float-end">ADD PROMOTION</a>
                </h3>
                
            </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Start date</th>
                    <th>End date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($promotions as $promotion)
                      <tr>
                        <td> {{$promotion->id}} </td>
                        <td> {{$promotion->title}} </td>
                        <td> {{$promotion->description}}</td>
                        <td>
                            @if (!$promotion->image)
                                <p>No image found</p>
                            @else
                                <img src="{{asset('uploads/promotion/'.$promotion->image)}}" style="width: 60px; height: 60px" alt="web_page">
                            @endif
    
                        </td>
                        <td> {{$promotion->start_date}} </td>
                        <td> {{$promotion->end_date}} </td>
                        <td> 
                            <a href=" {{url('/admin/promotion/'.$promotion->id.'/edit')}} " class="btn btn-secondary btn-sm" >EDIT</a>
                            <a href="#" class="btn btn-danger btn-sm" wire:click="deletePromotion({{$promotion->id}})" data-bs-toggle="modal" data-bs-target="#deletePromotionModal">DELETE</a>
                            <!-- Button trigger modal -->
                        </td>
                      </tr>
                      @empty
                        <tr>
                            <td colspan="7" >
                              <h4 class="text-center">No promotion found</h4>
                            </td>
                        </tr>
                    @endforelse
                  
                  
                </tbody>
              </table>
              <div class="my-3 ">
                {{$promotions->links()}}
              </div>
              
            </div>
          </div>
        </div>
    </div>

</div>



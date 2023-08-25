<!-- Add Amenity Modal -->
<div wire:ignore.self class="modal fade" id="addAmenityModal" tabindex="-1" aria-labelledby="DeleteCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add Amenity</h1>
          <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="storeAmenity">

          <div class="modal-body">
            <div class="mb-3">
                <label>Amenity Name</label>
                <input type="text" wire:model.defer="name" value="" class="form-control">
                @error('name')
                    <small class="text-danger"> {{$message}} </small>
                @enderror
            </div>
            <div class="mb-3">
                <label>Amenity Description</label>
                <input type="text" wire:model.defer="description" class="form-control">
                @error('name')
                    <small class="text-danger"> {{$message}} </small>
                @enderror
            </div>
            <div class="mb-3">
                <label>Status:</label> <br>
                <input type="checkbox" wire:model.defer="status" class="mt-3 me-2">Hidden
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">CANCEL</button>
            <button type="submit" data-bs-dismiss="modal"  class="btn btn-primary">ADD AMENITY</button>
          </div>
        </form>
        
      </div>
    </div>
</div>

<!-- Update Amenity Modal -->
<div wire:ignore.self class="modal fade" id="updateAmenityModal" tabindex="-1" aria-labelledby="UpdateAmenityModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Update Amenity</h1>
          <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="mx-auto my-5" wire:loading  >
            <div class="spinner-border text-primary " role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        <div wire:loading.remove>
            
        <form wire:submit.prevent="updateAmenity">

            <div class="modal-body">
              <div class="mb-3">
                  <label>Amenity Name</label>
                  <input type="text" wire:model.defer="name" class="form-control">
                  @error('name')
                      <small class="text-danger"> {{$message}} </small>
                  @enderror
              </div>
              <div class="mb-3">
                  <label>Amenity Description</label>
                  <input type="text" wire:model.defer="description" class="form-control">
                  @error('name')
                      <small class="text-danger"> {{$message}} </small>
                  @enderror
              </div>
              <div class="mb-3">
                  <label>Status:</label> <br>
                  <input type="checkbox" wire:model.defer="status" class="mt-3 me-2">Hidden
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">CANCEL</button>
              <button type="submit" data-bs-dismiss="modal"  class="btn btn-primary">UPDATE AMENITY</button>
            </div>
          </form>
        </div>

        
      </div>
    </div>
</div>

<!-- Delete Amenity Modal -->
<div wire:ignore.self class="modal fade" id="deleteAmenityModal" tabindex="-1" aria-labelledby="DeleteAmenityModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Amenity</h1>
          <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
   
         <form wire:submit.prevent="destroyAmenity">

            <div class="modal-body">
              <h4>Are you sure you want to delete this data</h4>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">CANCEL</button>
              <button type="submit" data-bs-dismiss="modal"  class="btn btn-danger">Yes, Delete</button>
            </div>
          </form>     
        
      </div>
    </div>
</div>

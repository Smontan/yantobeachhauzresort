<?php

namespace App\Http\Livewire\Admin\Amenity;

use App\Models\Amenity;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $name, $description, $status, $amenity_id;

    public function rules()
    {
        return [
            'name' => 'required|string',
            'description' => 'required|string',
            'status' => 'nullable'
        ];
    }

    public function resetInput()
    {
        $this->name = NULL;
        $this->description = NULL;
        $this->status = NULL;
        $this->amenity_id = NULL;
    }

    public function closeModal()
    {
        $this->resetInput();
    }

   
    public function storeAmenity()
    {
        $validatedData = $this->validate();
        Amenity::create([
            'name' => $this->name,
            'description' => $this->description,
            'status' => $this->status == true ? '1': '0',
        ]);
        // session()->flash('message', 'Amenity added successfully!');
        flash()
            ->option('timeout', 3000)
            ->addSuccess('Amenity "'.$this->name.'" added successfully!');
        $this->resetInput();
    }

    public function editAmenity(int $amenity_id)
    {
        $this->amenity_id = $amenity_id;
        $amenity = Amenity::findOrFail($amenity_id);
        $this->name = $amenity->name;
        $this->description = $amenity->description;
        $this->status = $amenity->status;
    }

    public function updateAmenity()
    {
        $validatedData = $this->validate();
        Amenity::findOrFail($this->amenity_id)->update([
            'name' => $this->name,
            'description' => $this->description,
            'status' => $this->status  == true ? '1':'0',
        ]);
        // session()->flash('message', 'Amenity updated successfully!');
        flash()
            ->option('timeout', 3000)
            ->addSuccess('Amenity updated successfully!');
        $this->resetInput();
    }

    public function deleteAmenity(int $amenity_id)
    {
        $this->amenity_id = $amenity_id;
    }

    public function destroyAmenity()
    {
        $amenity  = Amenity::findOrFail($this->amenity_id);
        
        // session()->flash('message', 'Amenity deleted successfully');
        flash()
            ->option('timeout', 3000)
            ->addSuccess('Amenity "'.$amenity->name.'" deleted');

        $amenity->delete();

        $this->resetInput(); 
    }
    public function render()
    {
        $amenities = Amenity::orderBy('id', 'DESC')->paginate(4);
        return view('livewire.admin.amenity.index', ['amenities' => $amenities])
            ->extends('layouts.admin')
            ->section('content');
    }
}

<?php

namespace App\Http\Livewire\Frontend\Room;

use App\Models\Category;
use App\Models\Room;
use Livewire\Component;

class Index extends Component
{
    
    
    public $category, $selectedCategories=[], $priceOrder;
    
    public function mount()
    {
        $this->category = Category::all();
    }

    public function render()
    {
        $room = Room::query();

        if(count($this->selectedCategories) > 0) {
            $room->whereIn('category_id', $this->selectedCategories);
            // dd($this->selectedCategories);
        }
        
        if($this->priceOrder) {
            $room->orderBy('price', $this->priceOrder);
            // dd($rooms);

        }

        $rooms = $room->get();

        return view('livewire.frontend.room.index', [
            'rooms' => $rooms,
            
            
        ]);
    }
}

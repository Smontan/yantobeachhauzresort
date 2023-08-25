<?php

namespace App\Http\Livewire\Admin\Promotion;

use App\Models\Promotion;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $promotion_id;

    public function deletePromotion($promotion_id)
    {
        $this->promotion_id = $promotion_id;
    }

    public function destroyPromotion()
    {
        $promotion = Promotion::findOrFail($this->promotion_id)->first();
        $path = 'uploads/promotion/'.$promotion->image;
        if(File::exists($path))
        {
            File::delete($path);
        }
        $promotion->delete();
        
        flash()
            ->option('timeout', 3000)
            ->addSuccess('Promotion "' . $promotion->title . '" deleted successfully!');
        
    }
    public function render()
    {
        $promotions = Promotion::orderBy('id', 'DESC')->paginate(10);
        return view('livewire.admin.promotion.index', ['promotions' => $promotions]);
    }
}

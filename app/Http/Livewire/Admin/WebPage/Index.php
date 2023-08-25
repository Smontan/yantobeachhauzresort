<?php

namespace App\Http\Livewire\Admin\WebPage;

use App\Models\WebPage;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $webPage_id;

   

    public function deleteWebPage($webPage_id)
    {
        $this->webPage_id = $webPage_id;
    }

    public function destroyWebPage()
    {
        $web_page = WebPage::findOrFail($this->webPage_id);
        $path = 'uploads/web_page/'.$web_page->image;
        if(File::exists($path)){
            File::delete($path);
        }
        
        flash()
            ->option('timeout', 3000)
            ->addSuccess('Web page "'.$web_page->name.'" is deleted');

        $web_page->delete();
        // session()->flash('message', 'Web page is deleted');

    }

    public function render()
    {
        $web_pages = WebPage::orderBy('id', 'DESC')->paginate(10);
        return view('livewire.admin.web-page.index', ['web_pages' => $web_pages]);
    }

}

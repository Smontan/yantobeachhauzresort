<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Promotion;
use App\Models\WebPage;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrontendController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }


    public function index()
    {
        $webPage = WebPage::where('name', 'Hero Section')
            ->where('status', '0')
            ->first();

        $promotion = Promotion::where('start_date', '<=', Carbon::now())
            ->where('end_date', '>=', Carbon::now() )->get();
        
        return view('frontend.index', compact('webPage', 'promotion'));
    }

    public function about()
    {
        $webPage = WebPage::where('name', 'About Section')
            ->where('status', '0')
            ->first();
        return view('frontend.about.index', compact('webPage'));
    }
    public function contact()
    {
        $webPage = WebPage::where('name', 'Contact Section')
            ->where('status', '0')
            ->first();
        return view('frontend.contact.index', compact('webPage'));
    }

    // Room Filters
    public function roomFilters()
    {
        // $category = Category::all();
        // return view('frontend.rooms.category.index', compact('category'));
        return view('frontend.rooms.category.index');
    }


}
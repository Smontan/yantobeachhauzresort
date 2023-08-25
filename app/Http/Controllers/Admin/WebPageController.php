<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\WebPageFormRequest;
use App\Models\WebPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Livewire\WithPagination;

class WebPageController extends Controller
{


    // public function index()
    // {
    //     $web_pages = WebPage::all();
    //     return view('admin.web_page.index', compact('web_pages'));
    // }

    public function index()
    {
        return view('admin.web_page.index');
    }

    public function create()
    {
        return view('admin.web_page.create');
    }

    public function store(WebPageFormRequest $request)
    {
        $validated = $request->validated();

        $web_page = new WebPage;
        $web_page->title = $validated['title'];
        $web_page->sub_title = $validated['sub_title'];
        $web_page->name = $validated['name'];
        $web_page->description = $validated['description'];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $ext;

            $file->move('uploads/web_page/', $fileName);

            $web_page->image = $fileName;
        }
        $web_page->status = $request->status == true ? '1' : '0';

        $web_page->save();

        flash()
            ->option('timeout', 3000)
            ->addSuccess('Web page "'.$web_page->name.'" added successfully!');
        return redirect('/admin/web_page');
        // return redirect('/admin/web_page')->with('message', 'Web page added successfully!');
    }

    public function edit(WebPage $web_page)
    {

        return view('admin.web_page.edit', compact('web_page'));
    }

    public function update(WebPageFormRequest $request, $web_page)
    {
        $validated = $request->validated();

        $web_page = WebPage::findOrFail($web_page);


        $web_page->title = $validated['title'];
        $web_page->sub_title = $validated['sub_title'];
        $web_page->name = $validated['name'];
        $web_page->description = $validated['description'];

        $path = '/uploads/web_page' . $web_page->image;
        if ($request->hasFile('image')) {
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $ext;

            $file->move('uploads/web_page/', $fileName);

            $web_page->image = $fileName;
        }
        $web_page->status = $request->status == true ? '1' : '0';
        $web_page->update();

        flash()
            ->option('timeout', 3000)
            ->addSuccess('Web page "'.$web_page->title.'" updated successfully!');
        return redirect('/admin/web_page');
        // return redirect('/admin/web_page')->with('message', 'Web page updated successfully!');
    }

    public function destroy(WebPage $web)
    {
        return $web;

    }
}
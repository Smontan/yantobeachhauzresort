<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryFormRequest $request)
    {
        $validated = $request->validated();

        $category = new Category;
        $category->name = $validated['name'];
        $category->description = $validated['description'];

        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $fileName = time().'.'.$ext;

            $file->move('uploads/category/',$fileName);

            $category->image = $fileName;
        }
        $category->status = $request->status == true ? '1' : '0';

        $category->save();

        flash()
            ->option('timeout', 3000)
            ->addSuccess('Category added successfully!');

        return redirect('/admin/category');   
        // return redirect('/admin/category')->with('message', 'Category added successfully!');   
    }

    public function edit(Category $category){
        return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryFormRequest $request, $category)
    {
        $validated = $request->validated();

        $category = Category::findOrFail($category);
        $category->name = $validated['name'];
        $category->description = $validated['description'];

        $path = '/uploads/category'.$category->image;
        if($request->hasFile('image')){
            if(File::exists($path)){
                File::delete($path);
            } 

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $fileName = time().'.'.$ext;

            $file->move('uploads/category/',$fileName);

            $category->image = $fileName;
        }
        $category->status = $request->status == true ? '1' : '0';

        $category->update();

        flash()
            ->option('timeout', 3000)
            ->addSuccess('Category updated successfully!');
        return redirect('/admin/category');  
        // return redirect('/admin/category')->with('message', 'Category updated successfully!');  
    }

   
}

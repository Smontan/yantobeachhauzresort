<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PromotionFormRequest;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Livewire\WithPagination;

class PromotionController extends Controller
{
    public function index()
    {
        return view('admin.promotion.index');
    }

    public function create()
    {
        return view('admin.promotion.create');
    }

    public function store(PromotionFormRequest $request)
    {
        $validated = $request->validated();

        $promotion = new Promotion;
        $promotion->title = $validated['title'];
        $promotion->description = $validated['description'];
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $ext;

            $file->move('uploads/promotion/', $fileName);

            $promotion->image = $fileName;
        }
        $promotion->start_date = $validated['start_date'];
        $promotion->end_date = $validated['end_date'];

        $promotion->save();

        flash()
            ->option('timeout', 3000)
            ->addSuccess('Promotion "' . $promotion->title . '" added successfully!');

        return redirect('admin/promotion');
    }

    public function edit(Promotion $promotion)
    {
        return view('admin.promotion.edit', compact('promotion'));
    }

    public function update(PromotionFormRequest $request, $promotion)
    {
        $validated = $request->validated();

        $promotion = Promotion::findOrFail($promotion);
        $promotion->title = $validated['title'];
        $promotion->description = $validated['description'];

        if ($request->hasFile('image')) {
            $path = '/uploads/promotion' . $promotion->image;

            if (File::exists($path)) {
                File::delete($path);
            }


            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $ext;

            $file->move('uploads/promotion/', $fileName);

            $promotion->image = $fileName;
        }
        $promotion->start_date = $validated['start_date'];
        $promotion->end_date = $validated['end_date'];

        $promotion->update();

        flash()
            ->option('timeout', 3000)
            ->addSuccess('Promotion "' . $promotion->title . '" edited successfully!');

        return redirect('admin/promotion');
    }
}
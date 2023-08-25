<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoomFormRequest;
use App\Models\Amenity;
use App\Models\Category;
use App\Models\Room;
use App\Models\RoomImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Livewire\WithPagination;

class RoomController extends Controller
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function index()
    {
        $rooms = Room::with(['category', 'amenities'])->orderBy('id', 'DESC')->paginate(100);
        return view('admin.room.index', compact('rooms'));

    }

    public function create()
    {
        $categories = Category::all();
        $amenities = Amenity::all();
        return view('admin.room.create', compact('categories', 'amenities'));
    }

    public function store(RoomFormRequest $request)
    {
        $validatedData = $request->validated();

        $room = new Room;
        $room->name = $validatedData['name'];
        $room->description = $validatedData['description'];
        $room->category_id = $validatedData['category_id'];
        $room->price = $validatedData['price'];
        $room->num_beds = $validatedData['num_beds'];
        $room->promo_rate = $validatedData['promo_rate'];
        $room->no_breakfast_price = $validatedData['no_breakfast_price'];
        $room->max_guests = $validatedData['max_guests'];
        $room->status = $request->status == true ? '1' : '0';

        if ($request->hasFile('image')) {
            $uploadPath = 'uploads/room/';

            $i = 1;
            foreach ($request->file('image') as $imageFile) {
                $extension = $imageFile->getClientOriginalExtension();
                $fileName = time() . $i++ . '.' . $extension;
                $imageFile->move($uploadPath, $fileName);
                $finalImagePathName = $uploadPath . $fileName;

                $room->roomImages()->create([
                    'room_id' => $room->id,
                    'image' => $finalImagePathName,
                ]);
            }
        }

        $room->save();
        $room->amenities()->sync($request->input('amenities'));

        flash()
            ->option('timeout', 3000)
            ->addSuccess('Room "' . $room->name . '" added successfully');

        return redirect('/admin/room');
    }

    public function edit(int $room_id)
    {
        $room = Room::findOrFail($room_id);
        $categories = Category::all();
        $amenities = Amenity::all();
        return view('admin.room.edit', compact('categories', 'amenities', 'room'));
    }

    public function update(RoomFormRequest $request, int $room_id)
    {
        $validatedData = $request->validated();
        $room = Category::findOrFail($validatedData['category_id'])
            ->room()->where('id', $room_id)->first();
        ;


        if ($room) {
            $room->name = $validatedData['name'];
            $room->description = $validatedData['description'];
            $room->category_id = $validatedData['category_id'];
            $room->price = $validatedData['price'];
            $room->num_beds = $validatedData['num_beds'];
            $room->promo_rate = $validatedData['promo_rate'];
            $room->no_breakfast_price = $validatedData['no_breakfast_price'];
            $room->max_guests = $validatedData['max_guests'];
            $room->status = $request->status == true ? '1' : '0';

            if ($request->hasFile('images')) {
                $uploadPath = 'uploads/room/';

                $i = 1;
                foreach ($request->file('images') as $imageFile) {
                    $extension = $imageFile->getClientOriginalExtension();
                    $fileName = time() . $i++ . '.' . $extension;
                    $imageFile->move($uploadPath, $fileName);
                    $finalImagePathName = $uploadPath . $fileName;

                    $room->roomImages()->create([
                        'room_id' => $room->id,
                        'image' => $finalImagePathName,
                    ]);
                }
            }
            $room->update();
            $room->amenities()->sync($request->input('amenities'));

            flash()
                ->option('timeout', 3000)
                ->addSuccess('Room "' . $room->name . '" updated successfully');

            return redirect('admin/room');
        } else {
            flash()
                ->option('timeout', 3000)
                ->addError('No room found');
            return redirect('admin/room');
        }
    }

    public function destroyImage(int $room_image_id)
    {
        $roomImage = RoomImage::findOrFail($room_image_id);
        if (File::exists($roomImage->image)) {
            File::delete($roomImage->image);
        }
        $roomImage->delete();

        flash()
            ->option('timeout', 3000)
            ->addSuccess('Room image deleted');
        // return redirect()->back()->with('message', 'Room image deleted');
        return redirect()->back();
    }

    public function destroy(int $room_id)
    {
        $room = Room::findOrfail($room_id);
        if ($room->roomImages) {
            foreach ($room->roomImages as $image) {
                if (File::exists($image->image)) {
                    File::delete($image->image);
                }
            }
        }
        $room->delete();

        flash()
            ->option('timeout', 3000)
            ->addSuccess('Room deleted with all the images');
        // return redirect('admin/room')->with('message', 'Room deleted with all the images');
        return redirect('admin/room');

    }
}
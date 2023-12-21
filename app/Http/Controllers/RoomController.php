<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::all();
        return view('admin-panel.room.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin-panel.room.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'image_1' => 'required|image|mimes:png,jpg,jpeg',
            'image_2' => 'required|image|mimes:png,jpg,jpeg',
            'image_3' => 'required|image|mimes:png,jpg,jpeg',
            'image_4' => 'required|image|mimes:png,jpg,jpeg',
        ]);

        

        $image_1 = $request->image_1;
        $imageName1 = uniqid() . '_' . $image_1->getClientOriginalName();
        $image_1->storeAs('public/room-images/', $imageName1);

        $image_2 = $request->image_2;
        $imageName2 = uniqid() . '_' . $image_2->getClientOriginalName();
        $image_2->storeAs('public/room-images/', $imageName2);

        $image_3 = $request->image_3;
        $imageName3 = uniqid() . '_' . $image_3->getClientOriginalName();
        $image_3->storeAs('public/room-images/', $imageName3);

        $image_4 = $request->image_4;
        $imageName4 = uniqid() . '_' . $image_4->getClientOriginalName();
        $image_4->storeAs('public/room-images/', $imageName4);

        $data['image_1'] = $imageName1;
        $data['image_2'] = $imageName2;
        $data['image_3'] = $imageName3;
        $data['image_4'] = $imageName4;

        Room::create($data);

        return redirect()->route('rooms.index')->with('successMsg', 'A room has been created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $roomEdit = Room::find($id);
        $categories = Category::all();
        return view('admin-panel.room.edit', compact('roomEdit', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'image_1' => 'nullable|image|mimes:png,jpg,jpeg',
            'image_2' => 'nullable|image|mimes:png,jpg,jpeg',
            'image_3' => 'nullable|image|mimes:png,jpg,jpeg',
            'image_4' => 'nullable|image|mimes:png,jpg,jpeg',
        ]);

        $room = Room::find($id);
        if ($request->hasFile('image_1')) {
            $image_1 = $room->image_1;
            File::delete('storage/room-images/' . $image_1);

            $image_1 = $request->image_1;
            $imageName1 = uniqid() . '_' . $image_1->getClientOriginalName();
            $image_1->storeAs('public/room-images/', $imageName1);

            $data['image_1'] = $imageName1;
        }


        if ($request->hasFile('image_2')) {
            $image_2 = $room->image_2;
            File::delete('storage/room-images/' . $image_2);

            $image_2 = $request->image_2;
            $imageName2 = uniqid() . '_' . $image_2->getClientOriginalName();
            $image_2->storeAs('public/room-images/', $imageName2);

            $data['image_2'] = $imageName2;
        }



        if ($request->hasFile('image_3')) {
            $image_3 = $room->image_3;
            File::delete('storage/room-images/' . $image_3);


            $image_3 = $request->image_3;
            $imageName3 = uniqid() . '_' . $image_3->getClientOriginalName();
            $image_3->storeAs('public/room-images/', $imageName3);

            $data['image_3'] = $imageName3;
        }



        if ($request->hasFile('image_4')) {
            $image_4 = $room->image_4;
            File::delete('storage/room-images/' . $image_4);


            $image_4 = $request->image_4;
            $imageName4 = uniqid() . '_' . $image_4->getClientOriginalName();
            $image_4->storeAs('public/room-images/', $imageName4);

            $data['image_4'] = $imageName4;
        }


        $room->update($data);
        return redirect()->route('rooms.index')->with('successMsg', 'A room has been updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Room::find($id)->delete();

        return back()->with('successMsg', 'A room has been deleted succcessfully');
    }
}

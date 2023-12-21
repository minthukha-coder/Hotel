<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class UiController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('index', compact('rooms'));
    }

    public function detail($roomId)
    {
        $room = Room::find($roomId);
        return view('detail', compact('room'));
    }
}

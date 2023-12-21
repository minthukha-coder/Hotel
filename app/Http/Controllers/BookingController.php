<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{

    public function index()
    {
        $bookings = Booking::all();
        return view('admin-panel.booking.index', compact('bookings'));
    }


    public function store(Request $request, $id)
    {
        $room = Room::find($id);
        $duration = (strtotime($request->end_date) - strtotime($request->start_date)) / (60 * 60 * 24);

        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ], [
            'end_date.after' => 'The end date must be after the start date.',
        ]);

        Booking::create([
            'customer_id' => Auth::user()->id,
            'room_id' => $id,
            'check_in_date' => $request->start_date,
            'check_out_date' => $request->end_date,
            'duration' => $duration,
            'total_amount' => $room->price * $duration
        ]);

        return back();
    }

    public function show($roomId)
    {
        $bookings = Booking::where('room_id', $roomId)->get();
        return view('admin-panel.booking.book', compact('bookings'));
    }
}

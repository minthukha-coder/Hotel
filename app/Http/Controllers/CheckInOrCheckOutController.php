<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\CheckIn;
use App\Models\CheckOut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckInOrCheckOutController extends Controller
{

    public function checkInPage()
    {
        $checkIns = CheckIn::all();
        return view('admin-panel.check-in.index', compact('checkIns'));
    }

    public function checkOutPage()
    {
        $checkOuts = CheckOut::all();
        return view('admin-panel.check-out.index', compact('checkOuts'));
    }
    public function checkIn($bookingId)
    {
        $booking = Booking::find($bookingId);
        CheckIn::create([
            'room_id' => $booking->room_id,
            'booking_id' => $bookingId,
            'check_in_date' => $booking->check_in_date,
            'check_in_by_id' => Auth::user()->id
        ]);
        $room = $booking->room;

        $room->update(['status' => 0]);

        Booking::find($bookingId)->delete();
        return redirect()->route('checkInPage');
    }

    public function checkOut($checkInId)
    {
        $checkIn = CheckIn::find($checkInId);
        CheckOut::create([
            'room_id' => $checkIn->room_id,
            'check_in_id' => $checkIn->id,
            'check_out_date' => now()->timezone('Asia/Yangon'),
        ]);

        $room = $checkIn->room;
        $room->update(['status' => 1]);


        return redirect()->route('checkOutPage');
    }
}

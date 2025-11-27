<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index()
    {
        return view('booking.index');
    }

    public function slots(Request $req)
    {
        $req->validate([
            'date' => 'required|date'
        ]);

        $model = new Booking();
        $available = $model->getAvailableSlots($req->date);

        return view('booking.slots', [
            'date' => $req->date,
            'available' => $available
        ]);
    }

    public function confirm(Request $req)
    {
        $req->validate([
            'date' => 'required|date',
            'slot' => 'required',
            'name' => 'required',
            'service' => 'required'
        ]);

        $model = new Booking();
        $model->book($req->date, $req->slot, $req->name, $req->service);

        return redirect()->route('booking.done');
    }

    public function done()
    {
        return view('booking.done');
    }
}

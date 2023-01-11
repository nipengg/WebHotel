<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function hotel()
    {
        $hotel = Hotel::all();

        return view('hotel', [
            'hotel' => $hotel,
        ]);
    }

    public function viewHotel($id)
    {
        $hotel = Hotel::findOrFail($id);

        $rooms = Room::where('hotel_id', $id)->get();

        return view('viewHotel', [
            'hotel' => $hotel,
            'rooms' => $rooms,
        ]);
    }
}

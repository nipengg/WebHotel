<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function indexHotel()
    {
        $data = Hotel::all();

        return view('admin.hotel.index', [
            'data' => $data,
        ]);
    }

    public function createHotel()
    {
        return view('admin.hotel.create');
    }
}

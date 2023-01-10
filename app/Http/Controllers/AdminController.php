<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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

    public function storeHotel(Request $request)
    {
        $data = $request->all();

        if ($file = $request->file('files')) {
            $destinationPath = 'file/';
            $fileInput = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $fileInput);
            $data['files'] = $fileInput;
        }

        Hotel::create([
            'NamaHotel' => $data['name'],
            'AlamatHotel' => $data['alamat'],
            'NoTelpHotel' => $data['no_telp'],
            'FotoHotel' => $data['files'],
        ]);

        return redirect()->route('admin.hotel')->with('success_message', 'Success!');
    }
}

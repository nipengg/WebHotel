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

        $request->validate([
            'name' => 'required|string|max:255',
            'alamat' => 'required|string|max:500',
            'no_telp' => 'required|number|max:15',
            'files' => 'required|max:10000|mimes:jpeg,jpg,png',
        ]);

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

    public function editHotel($id)
    {
        $hotel = Hotel::findOrFail($id);

        return view('admin.hotel.edit', [
            'hotel' => $hotel,
        ]);
    }

    public function updateHotel(Request $request, $id)
    {
        $data = $request->all();
        $hotel = Hotel::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'alamat' => 'required|string|max:500',
            'no_telp' => 'required|string|max:15',
            'files' => 'max:10000|mimes:jpeg,jpg,png',
        ]);

        if ($file = $request->file('files')) {

            // Delete Old File
            $file_path = public_path() . '/file/' . $hotel['files'];
            File::delete($file_path);

            // Add New File
            $destinationPath = 'file/';
            $fileInput = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $fileInput);
            $data['files'] = "$fileInput";

            $hotel->update([
                'NamaHotel' => $data['name'],
                'AlamatHotel' => $data['alamat'],
                'NoTelpHotel' => $data['no_telp'],
                'FotoHotel' => $data['files'],
            ]);

        } else {
            $hotel->update([
                'NamaHotel' => $data['name'],
                'AlamatHotel' => $data['alamat'],
                'NoTelpHotel' => $data['no_telp'],
            ]);
        }

        return redirect()->route('admin.hotel')->with('success_message', 'Success!');
    }

    public function deleteHotel($id)
    {
        
    }
}

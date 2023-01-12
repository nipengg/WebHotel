<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function transaction($id)
    {
        $room = Room::findOrFail($id);

        return view('transaction.transaction', [
            'room' => $room
        ]);
    }
}

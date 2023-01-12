<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function transaction($id)
    {
        $room = Room::findOrFail($id);
        $today = date('Y-m-d');
        $tomorrow = date("Y-m-d", strtotime('tomorrow'));

        return view('transaction.transaction', [
            'room' => $room,
            'today' => $today,
            'tomorrow' => $tomorrow,
        ]);
    }

    public function storeTransaction(Request $request)
    {
        $data = $request->all();

        Transaction::create([
            'hotel_id' => $data['hotel_id'],
            'room_id' => $data['room_id'],
            'customer_id' => $data['customer_id'],
            'TanggalCheckIn' => $data['checkin'],
            'TanggalCheckOut' => $data['checkout'],
            'TotalBayar' => $data['Harga'],
            'Harga' => $data['totalHarga'],
            'JumlahOrang' => $data['JumlahOrang'],
            'JenisPayment' => "Cash",
        ]);

        return redirect()->route('hotel');
    }

    public function index()
    {
        $transactions = Transaction::all();

        return view('admin.transaction.index', [
            'transactions' => $transactions,
        ]);
    }
}

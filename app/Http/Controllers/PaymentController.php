<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function index()
    {
        $items = Payment::all();
        return response()->json($items);
    }

    public function store(Request $request)
    {
        $request->validate([            'id' => 'required',
            'user_id' => 'required',
            'order_id' => 'required',
            'payment_date' => 'required',
            'payment_method' => 'required',
            'total_amount' => 'required',
        ]);

        $item = new Payment($request->all());
        $item->save();

        return response()->json($item, 201);
    }

    public function show($id)
    {
        $item = Payment::findOrFail($id);
        return response()->json($item);
    }

    public function update(Request $request, $id)
    {
        $request->validate([            'id' => 'required',
            'user_id' => 'required',
            'order_id' => 'required',
            'payment_date' => 'required',
            'payment_method' => 'required',
            'total_amount' => 'required',
        ]);

        $item = Payment::findOrFail($id);
        $item->update($request->all());

        return response()->json($item, 200);
    }

    public function destroy($id)
    {
        $item = Payment::findOrFail($id);
        $item->delete();

        return response()->json(['message' => 'Payment deleted successfully']);
    }
}